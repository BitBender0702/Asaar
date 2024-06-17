<?php

    namespace App\Http\Livewire;
    use Illuminate\Support\Facades\DB;
    use App\Http\Livewire\Traits\WithPagination;
    use Illuminate\Http\Request;
    use Livewire\Component;
    use App\Models\Product;
class LegumePagination extends Component
{
    use WithPagination;
     /**
     * Write code on Method
     *
     * @return response()
     */
    public $pageName = 'vegetables';
    
   
    public function render()
    {
        $regions=DB::table('regions')->where('regions.display', 1)->take(5)->get();
    $regionList=json_decode(json_encode($regions),true);
    $legumes=DB::table("products")
    ->where('display',1)
    ->select("products.*","price_by_regions.quantity_group")
    ->join(DB::raw("(SELECT price_by_regions.id_product,price_by_regions.id_region,price_by_regions.date,
        GROUP_CONCAT(price_by_regions.moyen,';', price_by_regions.id_region ORDER BY price_by_regions.id_region ASC) as quantity_group 
   
        FROM price_by_regions
        WHERE id_type = 1 AND date=(SELECT MAX(date) FROM price_by_regions)
        GROUP BY id_product
        ) as price_by_regions"),function($join){
   
          $join->on("price_by_regions.id_product","=","products.id");
   
    })
   
    ->groupBy("products.id")
    ->where('products.id_category', 7)->where('products.display', 1)->paginate(10, ['*'], $this->pageName());
        return view('livewire.legume-pagination',[            
            
            'regions'=>$regions,
            
             'legumes'=>$legumes
            
        ]);
        
    }
}
