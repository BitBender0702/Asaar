<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\PriceByRegion;
use App\Models\PriceByCity;
use App\Models\PriceNational;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Models\Type;

class CronController extends Controller
{
public $listUpper=[];//define collection


   //get by distributeur les prix regionaux

    public $products=[];
    public $product = [];
  
   public function getFromPgsqlRegional(){
    $upper=[];
    $this->products=[];
    $this->listUpper=[];
    set_time_limit(50000);
    $prods=DB::connection('mysql')->table('products')->select('code','id')->get();
    $marches = Type::all();
    foreach ($marches as &$marche) {
        $upper=[];
        $this->products=[];
        $this->listUpper=[];    
    // $users = DB::connection('pgsql')->table('prix_produits as pr')->join('produit as p','p.unid','=','pr.product_id')
    // ->join('region as r','r.unid','=','pr.region_id')->join('province as pro','pro.unid','=','pr.province_id')->join('indicateur as i','i.unid','=','pr.indicateur_id')->get(['pr.*','p.libelle as product','r.libelle as region','pro.libelle as province','i.libelle as indicateur']);
    for ($i=0; $i < count(json_decode(json_encode($prods),true)); $i++) {
      array_push($this->listUpper,(string)json_decode(json_encode($prods),true)[$i]['code']);
    }
    $upper = $this->listUpper;

    $users = DB::connection('mysql')->table('price_by_cities')
    ->join('products as p','p.id','=','price_by_cities.id_product')
    ->join('cities as c','c.id','=','price_by_cities.id_city')
    ->join('regions as r','r.id','=','c.id_region')
    ->where('price_by_cities.type',$marche->id)
    ->groupBy('p.code','r.code','date')
    ->where('date','>',Carbon::now()->subDays(3)->isoFormat("YYYY-MM-DD"))
    ->orderBy('date','desc')
    ->select('date','p.code as product',DB::raw('trim(r.code) as region'),DB::raw('ROUND(AVG(CAST(moyen AS DECIMAL(10,5))),5) AS moyen') )
    ->get();
    $regions=DB::connection('mysql')->table('regions')->get(['id','code']);
    foreach (json_decode(json_encode($users),true) as &$key) {
        foreach (json_decode(json_encode($regions),true) as &$reg) {
            if($key['region']==$reg['code']){
                
                 array_push($this->products, (object)['idregion' => $reg['id'], 'id' => Collect(json_decode(json_encode($prods),true))->where("code", $key['product'])->first()['id'],'date'=>$key['date'],'moyen'=>$key['moyen']]);
 
            }
        }
    }
   foreach($this->products as &$product){
    try {
        if(PriceByRegion::where('date',$product->date)->where('id_product',$product->id)->where('id_region',$product->idregion)->where('id_type',$marche->id)->exists()) {
            PriceByRegion::where('date',$product->date)->where('id_product',$product->id)->where('id_region',$product->idregion)->where('id_type',$marche->id)->update(['moyen' =>$product->moyen]);
        }else{
            PriceByRegion::create(array('moyen' =>$product->moyen, 'date' => $product->date,'id_region'=>$product->idregion,'id_type'=>$marche->id,'id_product'=>$product->id));
        }

        //$user = PriceByRegion::updateOrCreate(array('moyen' =>$product->moyen, 'date' => $product->date,'id_region'=>$product->idregion,'id_type'=>$marche->id,'id_product'=>$product->id));
    } catch (\Exception $e) {
    }
    }    
}
    return response()->json($this->products);
   }

  //get by distributeur les prix par ville
   public $listUpperCity=[];
    public $productsCity=[];
   public function getFromPgsqlCities(){
    set_time_limit(50000);
    $prods=DB::connection('mysql')->table('products')->select('code','id')->get();
    // $users = DB::connection('pgsql')->table('prix_produits as pr')->join('produit as p','p.unid','=','pr.product_id')
    // ->join('region as r','r.unid','=','pr.region_id')->join('province as pro','pro.unid','=','pr.province_id')->join('indicateur as i','i.unid','=','pr.indicateur_id')->get(['pr.*','p.libelle as product','r.libelle as region','pro.libelle as province','i.libelle as indicateur']);
    $marches=DB::connection('mysql')->table('types')->get();
   
    foreach ($marches as &$marche) {
        $this->listUpperCity=[];
        $this->productsCity=[];
    for ($i=0; $i < count(json_decode(json_encode($prods),true)); $i++) {
        array_push($this->listUpperCity,json_decode(json_encode($prods),true)[$i]['code']);
    }
    $users = DB::connection('pgsql')->table('stats_detail')
    ->join('province as r','r.unid','=','stats_detail.province_id')
    ->join('produit as p','p.unid','=','stats_detail.produit_id')
    ->whereIn(DB::raw('trim(p.code)'),$this->listUpperCity)
    ->join('zone','zone.unid','=','stats_detail.zone_id')
    ->join('distributeur','distributeur.unid','=','zone.distributeur_id')
    ->where(DB::raw('trim(distributeur.code)'),'LIKE',$marche->code)
    ->where('stats_detail.valeur','<>','0')
    ->where('stats_detail.valeur','<>','')
    ->where('stats_detail.indicateur_id',1)
    ->groupBy('p.code','r.code','stats_detail.date')
    ->where('stats_detail.date','>',Carbon::now()->subDays(3)->isoFormat("YYYY-MM-DD"))
    ->select('stats_detail.date','p.code as product','r.code as city',DB::raw('ROUND(AVG(CAST(valeur AS DECIMAL(10,5))),5) AS Moyen') )
    ->get();
    
    $cities=DB::connection('mysql')->table('cities')->get(['id','code']);
    foreach (json_decode(json_encode($users),true) as &$key) {
        foreach (json_decode(json_encode($cities),true) as &$city) {
            if($key['city']==$city['code']){
               
                 array_push($this->productsCity, (object)['idcity' => $city['id'], 'id' => Collect(json_decode(json_encode($prods),true))->where("code", $key['product'])->first()['id'],'date'=>$key['date'],'moyen'=>$key['moyen']]);
 
            }
        }
    }
   foreach($this->productsCity as &$product){
     try {        
        if(PriceByCity::where('date',$product->date)->where('id_product',$product->id)->where('id_city',$product->idcity)->where('type',$marche->id)->exists()) {
            PriceByCity::where('date',$product->date)->where('id_product',$product->id)->where('id_city',$product->idcity)->where('type',$marche->id)->update(['moyen' =>$product->moyen]);
        }else{
            PriceByCity::create(array('moyen' =>$product->moyen, 'date' => $product->date,'id_city'=>$product->idcity,'type'=>$marche->id,'id_product'=>$product->id));
        }
    
    
    } catch (\Exception $e) {  
        var_dump($e->getMessage());

    }
    }
    }
    
    return response()->json($this->productsCity);
   }


   //get by distributeur les prix national

   public $listNational=[];
 
   public function getFromPgsqlNational(){
    set_time_limit(50000);
    $this->products=[];
    $marches=DB::connection('mysql')->table('types')->get();
    foreach ($marches as &$marche) {
        $this->products=[];
        $this->listNational=[];
        $this->listUpper=[];
        $prods=DB::connection('mysql')->table('products')->select('code','id')->get();
       
        for ($i=0; $i < count(json_decode(json_encode($prods),true)); $i++) {
            array_push($this->listUpper,json_decode(json_encode($prods),true)[$i]['code']);
        }
        $users = DB::connection('mysql')->table('price_by_cities')
        ->join('products  as p','p.id','=','price_by_cities.id_product')
        ->where('price_by_cities.type',$marche->id)
        ->groupBy('p.code','date','price_by_cities.type')
        ->where('date','>',Carbon::now()->subDays(3)->isoFormat("YYYY-MM-DD"))
        ->orderBy('date','desc')
        ->select('date','p.code as product',DB::raw('ROUND(AVG(CAST(moyen AS DECIMAL(10,5))),5) AS moyen') )
        ->get();
        
    $reversedUser=array_reverse(json_decode(json_encode($users),true),true);
    foreach ($reversedUser as &$key) {
        $idProduct=Collect(json_decode(json_encode($prods),true))->where("code", $key['product'])->first()['id'];
        $variation=0;
       
               

        
           //if PriceNational where date=$key['date'] and id_product=Collect(json_decode(json_encode($prods),true))->where("code", $key['product'])->first()['id'] and id_type=$marche->id then update else create
            if(PriceNational::where('date',$key['date'])->where('id_product',$idProduct)->where('id_type',$marche->id)->exists()){


                $latestRecord=PriceNational::where('date','<>',$key['date'])->where('id_product',$idProduct)->where('id_type',$marche->id)->orderBy('date','desc')->get();
                if($latestRecord->first()!=null){
                 $variation = (($key['moyen']-$latestRecord->first()->moyen)/$latestRecord->first()->moyen)*100;
                }
                else{
                 $variation=0;
                  }
                PriceNational::where('date',$key['date'])->where('id_product',$idProduct)->where('id_type',$marche->id)->update(['moyen'=>$key['moyen'],'pourcentage'=>$variation]);
            }
            else{
                $latestRecord=PriceNational::Where('id_product',$idProduct)->where('id_type',$marche->id)->orderBy('date','desc')->get();
                if($latestRecord->first()!=null){
                 $variation = (($key['moyen']-$latestRecord->first()->moyen)/$latestRecord->first()->moyen)*100;
                }
                else{
                 $variation=0;
                  }
                PriceNational::create(['moyen'=>$key['moyen'],'date'=>$key['date'],'pourcentage'=>$variation,'id_type'=>$marche->id,'id_product'=>$idProduct]);
            }

        //PriceNational::updateOrCreate(array('moyen' =>$key['moyen'], 'date' => $key['date'],'pourcentage'=>$variation,'id_type'=>$marche->id,'id_product'=>Collect(json_decode(json_encode($prods),true))->where("code", $key['product'])->first()['id'],));
    }   
    
   }
   return response()->json($users);

}
 
    public function launchCronJob(){
        $this->getFromPgsqlCities();
        $this->getFromPgsqlNational();
        $this->getFromPgsqlRegional();
 
    }
}