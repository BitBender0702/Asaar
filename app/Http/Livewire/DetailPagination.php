<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithPagination;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\StreamedResponse;


class DetailPagination extends Component
{
    use WithPagination;
    public $pageName = 'detailProd';
    public $idProd,$region,$ville,$startDate,$endDate,$regionName,$villeName,$prodName,$idCategory,$categoryName;
    public $descByPrice=null;
    public $descByDate=null;

    public function updateIdProd(){
        $this->resetPage();
    }
    public function mount($idProd,$region,$ville,$startDate,$endDate,$regionName,$villeName,$prodName,$descByPrice,$descByDate,$idCategory,$categoryName){
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
      }
    public function render()
    {
        $locale = session()->get('locale');
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
        ->where('r.display', 1);

        
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
             $this->detail=$detail->select('r.name as region', 'c.name as city','p.name as product','moyen','date');
            break;
     
            case('ar'):
                $this->detail=$detail->select('r.arab_name as region', 'c.arabic_name as city','p.arabic_name as product','moyen','date');

            break;
     
            case('en'):
                $this->detail=$detail->select('r.english_name as region', 'c.english_name as city','p.english_name as product','moyen','date');

            break;
     
            default:
            $this->detail=$detail->select('r.name as region', 'c.name as city','p.name as product','moyen','date');

            break;
               }

        
        return view('livewire.detail-pagination',[
            'regions'=>DB::table("regions")->where('display', 1)->get(),
            'cities'=>$cities->get(),
            'categories'=>DB::table("categories")->where('display', 1)->get(),
            'allProds'=>DB::table("products")->where('display', 1)->where('id_category',$this->idCategory)->get(),
            'details'=>$detail->paginate(10, ['*'], $this->pageName()),
        ]);
    }
   public function updateRegion($region,$regionName){
    $this->resetPage();
        $this->region=$region;
        $this->regionName=$regionName;
        $this->mount($this->idProd,$this->region,$this->ville, $this->startDate,$this->endDate,$this->regionName,$this->villeName,$this->prodName,$this->descByPrice,$this->descByDate,$this->idCategory,$this->categoryName);
    }
    public function updateVille($ville,$villeName){
        $this->resetPage();
        $this->ville=$ville;
        $this->villeName=$villeName;
        $this->mount($this->idProd,$this->region,$this->ville, $this->startDate,$this->endDate,$this->regionName,$this->villeName,$this->prodName,$this->descByPrice,$this->descByDate,$this->idCategory,$this->categoryName);

    }
    public function updateProd($idProd,$prodName){
        $this->resetPage();
        $this->idProd=$idProd;
        $this->prodName=$prodName;
        $this->mount($this->idProd,$this->region,$this->ville, $this->startDate,$this->endDate,$this->regionName,$this->villeName,$this->prodName,$this->descByPrice,$this->descByDate,$this->idCategory,$this->categoryName);

    }
    public function updateCategory($idCategory,$categoryName){
        $this->resetPage();
        $this->idCategory=$idCategory;
        $this->categoryName=$categoryName;
        $this->mount($this->idProd,$this->region,$this->ville, $this->startDate,$this->endDate,$this->regionName,$this->villeName,$this->prodName,$this->descByPrice,$this->descByDate,$this->idCategory,$this->categoryName);

    }
    public function updateStartDate($startDate){
            $this->resetPage();

        $this->startDate=$startDate;
        $this->emit('quantityUpdated');
        $this->mount($this->idProd,$this->region,$this->ville, $this->startDate,$this->endDate,$this->regionName,$this->villeName,$this->prodName,$this->descByPrice,$this->descByDate,$this->idCategory,$this->categoryName);

    }
    public function updateEndDate($endDate){
        $this->resetPage();
        $this->endDate=$endDate;
        $this->emit('quantityUpdated');
        $this->mount($this->idProd,$this->region,$this->ville, $this->startDate,$this->endDate,$this->prodName);
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
        $prod=$prod->where('p.id',$this->idProd)->select('r.name as region', 'c.name as city','p.name as product','p.arabic_name as par','p.english_name as peg','c.arabic_name as car','c.english_name as ceg','r.arab_name as rab','r.english_name as reg','moyen','date')->get()->toArray();
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
        if($locale=='fr'){
            $columns = array('Produit', 'Region', 'Ville', 'Prix', 'Date');
            $callback = function() use($prod, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
    
                foreach ($prod as $proda) {
                    $row['Produit']  = $proda->product;
                    $row['Region']    = $proda->region;
                    $row['Ville']    = $proda->city;
                    $row['Prix']  = $proda->moyen;
                    $row['Date']  = $proda->date;
    
                    fputcsv($file, array($row['Produit'], $row['Region'], $row['Ville'], $row['Prix'], $row['Date']));
                }
    
                fclose($file);
            };
        }
        if($locale=='ar'){
            $columns = array('المنتج', 'المنطقة', 'المدينة', 'السعر', 'التاريخ');
            $callback = function() use($prod, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
    
                foreach ($prod as $proda) {
                    $row['المنتج']  = $proda->par;
                    $row['المنطقة']    = $proda->rab;
                    $row['المدينة']    = $proda->car;
                    $row['السعر']  = $proda->moyen;
                    $row['التاريخ']  = $proda->date;
    
                    fputcsv($file, array($row['المنتج'], $row['المنطقة'], $row['المدينة'], $row['السعر'], $row['التاريخ']));
                }
    
                fclose($file);
            };
            }
            if($locale=='en'){
                $columns = array('Product', 'Region', 'City', 'Price', 'Date');
                $callback = function() use($prod, $columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
        
                    foreach ($prod as $proda) {
                        $row['Product']  = $proda->peg;
                        $row['Region']    = $proda->reg;
                        $row['City']    = $proda->ceg;
                        $row['Price']  = $proda->moyen;
                        $row['Date']  = $proda->date;
        
                        fputcsv($file, array($row['Product'], $row['Region'], $row['City'], $row['Price'], $row['Date']));
                    }
        
                    fclose($file);
                };
                }

        

       

        return response()->stream($callback, 200, $headers);
    }
   
}