<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithPagination;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\StreamedResponse;


class EvolutionPagination extends Component
{
    use WithPagination;
    public $pageName = 'detailProd';
    public $idProd,$region,$ville,$startDate,$endDate,$regionName,$villeName,$prodName,$idCategory,$categoryName;
    public $descByPrice=null;
    public $descByDate=null;
    public $idType=2;

    public function updateIdProd(){
        $this->resetPage();
    }
    public function updateIdType(){
        $this->resetPage();
    }
    public function mount($idProd,$region,$ville,$startDate,$endDate,$regionName,$villeName,$prodName,$descByPrice,$descByDate,$idCategory,$categoryName,$idType){
        $this->idProd=$idProd;
        $this->region=$region;
        $this->ville=$ville;
        $this->startDate=$startDate;
        $this->endDate=$endDate;
        $this->regionName=$regionName;
        $this->villeName=$villeName;
        $this->prodName=$prodName;
        $this->descByPrice=$descByPrice;
        $this->descByDate=$descByDate;
        $this->idCategory=$idCategory;
        $this->categoryName=$categoryName;
        $this->idType=$idType;
      }
    public function render()
    {
        $locale = session()->get('locale');
         $marches=DB::table('types')->where('types.display',1)->get();
       switch($locale){
       case('fr'):
        $this->prodName=DB::table("products")->where('display',1)->where('id', $this->idProd)->first()->name;
        $this->categoryName=DB::table("categories")->where('display',1)->where('id', $this->idCategory)->first()->name;
       break;

       case('ar'):
       $this->prodName=DB::table("products")->where('display',1)->where('id', $this->idProd)->first()->arabic_name;
       $this->categoryName=DB::table("categories")->where('display',1)->where('id', $this->idCategory)->first()->arabic_name;
       break;

       case('en'):
        $this->prodName=DB::table("products")->where('display',1)->where('id', $this->idProd)->first()->english_name;
        $this->categoryName=DB::table("categories")->where('display',1)->where('id', $this->idCategory)->first()->english_name;
       break;

       default:
       $this->prodName=DB::table("products")->where('display',1)->where('id', $this->idProd)->first()->name;
       $this->categoryName=DB::table("categories")->where('display',1)->where('id', $this->idCategory)->first()->name;
       break;
          }
          
        
        $prod=DB::table("price_by_cities")
        ->leftJoin('products as p','p.id','=','price_by_cities.id_product')
        ->where('p.display', 1)
        ->leftJoin('cities as c','c.id','=','price_by_cities.id_city')
        ->where('c.display', 1)
        ->leftJoin('regions as r','r.id','=','c.id_region')
        ->where('r.display', 1)
        ->where('price_by_cities.type',$this->idType)
        ->leftJoin('types as t','t.id','=','price_by_cities.type');

        if($this->descByPrice!=null){
            $prod=$prod->orderBy('price_by_cities.moyen',$this->descByPrice);
        }
        if($this->ville!=null){
            $prod=$prod->where('c.id',$this->ville);
        }
        if($this->descByDate!=null){
            $prod=$prod->orderBy('price_by_cities.date',$this->descByDate);
        }
        if($this->region!=null){
            $prod=$prod->where('r.id',$this->region);
        }
       
        if($this->startDate!=null && $this->endDate!=null){
            
            $prod=$prod->whereBetween('price_by_cities.date',[date('Y-m-d',strtotime($this->startDate)),date('Y-m-d', strtotime($this->endDate))]);
        }
        $cities =DB::table("cities")->where('display', 1);
        if($this->region!=null){
            $cities=$cities->where('id_region',$this->region);
        }
        else {
            $cities=$cities;
        }
        
        $detail=$prod->where('p.id',$this->idProd);

        switch($locale){
            case('fr'):
             $this->detail=$detail->select('r.name as region', 'c.name as city','p.name as product','p.unite_fr as unit','moyen','date','t.name as type');
            break;
     
            case('ar'):
                $this->detail=$detail->select('r.arab_name as region', 'c.arabic_name as city','p.arabic_name as product','p.unite_ar as unit','moyen','date','t.name as type');

            break;
     
            case('en'):
                $this->detail=$detail->select('r.english_name as region', 'c.english_name as city','p.unite_eng as unit','p.english_name as product','moyen','date','t.name as type');

            break;
     
            default:
            $this->detail=$detail->select('r.name as region', 'c.name as city','p.name as product','p.unite_fr as unit','moyen','date','t.name as type');

            break;
               }

        
        return view('livewire.evolution-pagination',[
            'regions'=>DB::table("regions")->where('display', 1)->get(),
            'cities'=>$cities->get(),
            'categories'=>DB::table("categories")->where('display', 1)->get(),
            'allProds'=>DB::table("products")->where('display', 1)->where('id_category',$this->idCategory)->get(),
            'details'=>$detail->paginate(10, ['*'], $this->pageName()),
            'marches'=>$marches,
        ]);
    }
   public function updateRegion($region,$regionName){
        $this->resetPage();
        $this->region=$region;
        $this->regionName=$regionName;
        $this->mount($this->idProd,$this->region,$this->ville, $this->startDate,$this->endDate,$this->regionName,$this->villeName,$this->prodName,$this->descByPrice,$this->descByDate,$this->idCategory,$this->categoryName,$this->idType);
    }
    public function updateVille($ville,$villeName){
        $this->resetPage();
        $this->ville=$ville;
        $this->villeName=$villeName;
        $this->mount($this->idProd,$this->region,$this->ville, $this->startDate,$this->endDate,$this->regionName,$this->villeName,$this->prodName,$this->descByPrice,$this->descByDate,$this->idCategory,$this->categoryName,$this->idType);

    }
    public function updateProd($idProd,$prodName){
        $this->resetPage();
        $this->idProd=$idProd;
        $this->prodName=$prodName;
        $this->mount($this->idProd,$this->region,$this->ville, $this->startDate,$this->endDate,$this->regionName,$this->villeName,$this->prodName,$this->descByPrice,$this->descByDate,$this->idCategory,$this->categoryName,$this->idType);

    }
    public function updateCategory($idCategory,$categoryName){
        $this->resetPage();
        $this->idCategory=$idCategory;
        $this->categoryName=$categoryName;
        $this->mount($this->idProd,$this->region,$this->ville, $this->startDate,$this->endDate,$this->regionName,$this->villeName,$this->prodName,$this->descByPrice,$this->descByDate,$this->idCategory,$this->categoryName,$this->idType);

    }
    public function updateStartDate($startDate){
            $this->resetPage();

        $this->startDate=$startDate;
        $this->emit('quantityUpdated');
        $this->mount($this->idProd,$this->region,$this->ville, $this->startDate,$this->endDate,$this->regionName,$this->villeName,$this->prodName,$this->descByPrice,$this->descByDate,$this->idCategory,$this->categoryName,$this->idType);

    }
    public function updateEndDate($endDate){
        $this->resetPage();
        $this->endDate=$endDate;
        $this->emit('quantityUpdated');
        $this->mount($this->idProd,$this->region,$this->ville, $this->startDate,$this->endDate,$this->regionName,$this->villeName,$this->prodName,$this->descByPrice,$this->descByDate,$this->idCategory,$this->categoryName,$this->idType);
    }
    public function submit(){}
    public function export()
    {
        $prod=DB::table("price_by_cities")
        ->leftJoin('products as p','p.id','=','price_by_cities.id_product')
        ->where('p.display', 1)
        ->leftJoin('cities as c','c.id','=','price_by_cities.id_city')
        ->where('c.display', 1)
        ->leftJoin('regions as r','r.id','=','c.id_region')
        ->where('price_by_cities.type', $this->idType)
        ->leftJoin('types as t','t.id','=','price_by_cities.type')
        ->where('r.display', 1);

        if($this->ville!=null){
            $prod=$prod->where('c.id',$this->ville);
        }
        if($this->region!=null){
            $prod=$prod->where('r.id',$this->region);
        }
       
        if($this->startDate!=null && $this->endDate!=null){        
            $prod=$prod->whereBetween('price_by_cities.date',[date('Y-m-d',strtotime($this->startDate)),date('Y-m-d', strtotime($this->endDate))]);
        }
        $locale = session()->get('locale');
        $prod=$prod->where('p.id',$this->idProd)->select('r.name as region', 'c.name as city','type','p.name as product','p.arabic_name as par','p.english_name as peg','c.arabic_name as car','c.english_name as ceg','r.arab_name as rab','r.english_name as reg','moyen','t.name as type','date')->get()->toArray();
        $fileName = 'Prix.csv';
        if($locale=='fr'){
        $fileName = 'Prix.csv';
        }
        if($locale=='ar'){
            $fileName = 'الأسعار.csv';
            }
            if($locale=='en'){
                $fileName = 'Prices.csv';
                }

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        $columns = array('Produit','Distributeur', 'Region', 'Ville', 'Prix', 'Date');
        $callback = function() use($prod, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($prod as $proda) {
                $row['Produit']  = $proda->product;
                $row['Distributeur']  = __($proda->type);
                $row['Region']    = $proda->region;
                $row['Ville']    = $proda->city;
                $row['Prix']  = $proda->moyen;
                $row['Date']  = $proda->date;

                fputcsv($file, array($row['Produit'],$row['Distributeur'], $row['Region'], $row['Ville'], $row['Prix'], $row['Date']));
            }

            fclose($file);
        };
        if($locale=='fr'){
            $columns = array('Produit','Distributeur', 'Region', 'Ville', 'Prix', 'Date');
            $callback = function() use($prod, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
    
                foreach ($prod as $proda) {
                    $row['Produit']  = $proda->product;
                    $row['Distributeur']  = __($proda->type);
                    $row['Region']    = $proda->region;
                    $row['Ville']    = $proda->city;
                    $row['Prix']  = $proda->moyen;
                    $row['Date']  = $proda->date;
    
                    fputcsv($file, array($row['Produit'],$row['Distributeur'], $row['Region'], $row['Ville'], $row['Prix'], $row['Date']));
                }
    
                fclose($file);
            };
            return response()->stream($callback, 200, $headers);

        }
        if($locale=='ar'){
            $columns = array('المنتج','الموزع', 'المنطقة', 'المدينة', 'السعر', 'التاريخ');
            $callback = function() use($prod, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
    
                foreach ($prod as $proda) {
                    $row['المنتج']  = $proda->par;
                    $row['الموزع']  = __($proda->type);
                    $row['المنطقة']    = $proda->rab;
                    $row['المدينة']    = $proda->car;
                    $row['السعر']  = $proda->moyen;
                    $row['التاريخ']  = $proda->date;
    
                    fputcsv($file, array($row['المنتج'],$row['الموزع'], $row['المنطقة'], $row['المدينة'], $row['السعر'], $row['التاريخ']));
                }
    
                fclose($file);
            };
            return response()->stream($callback, 200, $headers);

            }
            if($locale=='en'){
                $columns = array('Product','Distributor', 'Region', 'City', 'Price', 'Date');
                $callback = function() use($prod, $columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
        
                    foreach ($prod as $proda) {
                        $row['Product']  = $proda->peg;
                        $row['Distributor']  = __($proda->type);
                        $row['Region']    = $proda->reg;
                        $row['City']    = $proda->ceg;
                        $row['Price']  = $proda->moyen;
                        $row['Date']  = $proda->date;
        
                        fputcsv($file, array($row['Product'],$row['Distributor'], $row['Region'], $row['City'], $row['Price'], $row['Date']));
                    }
        
                    fclose($file);
                };
                return response()->stream($callback, 200, $headers);
                }

                return response()->stream($callback, 200, $headers);


       

        
    }
   
}
