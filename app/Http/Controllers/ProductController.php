<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Email;
use Carbon\Carbon;

class ProductController extends Controller
{
    //
    function show(){
        $categories=DB::table('categories')->where('categories.display',1)->get();
        $marches=DB::table('types')->where('types.display',1)->get();
        return view('welcome',[
            'categories'=>$categories,
            'marches'=>$marches
        ]);
    }
    
    public function getProductsFromCat($list_category){
        $list_categorys= str_replace(['[', ']'], null, $list_category);
        $list_categoryname= explode( ',',$list_categorys);
        echo json_encode(DB::table('products')->whereIn('id_category',$list_categoryname)->where('display',1)->get());    
    }
    public function getNationalPrice($list_products,$period,$type){
        $list_product= str_replace(['[', ']'], null, $list_products);
        $list_product_id= explode( ',',$list_product);
        $firtProduct=DB::table('price_nationals') -> whereIn('id_product',$list_product_id)->orderBy('date','Desc')->first();
        $dateMinusPeriod= date('Y-m-d', strtotime(Carbon::now().  $period));
        $prods= json_encode(DB::table('price_nationals') -> whereIn('id_product',$list_product_id)
        ->join('products as p','p.id','=','price_nationals.id_product')
        ->where('id_type',$type)->select("price_nationals.id" ,DB::raw("(avg(moyen)) as moyen"),"date",'p.unite_fr as unite_fr','p.unite_ar as unite_ar','p.unite_eng as unite_eng')-> whereBetween('date',[$dateMinusPeriod,Carbon::now()])->groupBy('date')->get()); 
        return $prods;
    }  
    public function getDetail($idCategory,$id){
        return view('detailProduit',compact(["idCategory","id"]));
    }
    public function getVilleByRegion($id){
        return json_encode(DB::table('cities')->where('display',1)->where('id_region',$id)->get());    
    }
   public function contacter(Request $request){
    $validator = Validator::make($request->all(),[
        'nom' => 'required',
        'email' => 'required',
        'sujet' => 'required',
        'message' => 'required',
    ]);
    $input=$request->all();
        if ($validator->fails()) {
            return response()->json(["errors"=>$validator->errors()], 422); 
        }else {
            Email::create($input);
            return redirect()->back(); 
        }
   }
   public function getFooter(){
 
    $users = DB::table('footer')->first();
    return response()->json($users);

   }
   
}
