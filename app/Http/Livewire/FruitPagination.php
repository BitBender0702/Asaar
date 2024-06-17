<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithPagination;
use Illuminate\Http\Request;
use Livewire\Component;

class FruitPagination extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
     /**
     * Write code on Method
     *
     * @return response()
     */
    public $pageName = 'frts';
   public $categorie;
  
    public function render()
    {
        return view('livewire.fruit-pagination',[
            'regions'=>DB::table('regions')->where('regions.display', 1)->limit(5)->get(),
            'fruits'=>DB::table("products")->where('display',1)
        
            ->select("products.*","price_by_regions.quantity_group")
           
            ->join(DB::raw("(SELECT price_by_regions.id_product,price_by_regions.id_region,price_by_regions.date,
            GROUP_CONCAT(DB::raw('ROUND(price_by_regions.moyen,2)'),';', price_by_regions.id_region ORDER BY price_by_regions.id_region ASC) as quantity_group 
       
            FROM price_by_regions
            WHERE id_type = 1 AND date=(SELECT MAX(date) FROM price_by_regions)
            GROUP BY id_product
            ) as price_by_regions"),function($join){
       
              $join->on("price_by_regions.id_product","=","products.id");
       
        })
           
            ->groupBy("products.id")
            ->where('products.id_category',$this->categorie)->where('products.display', 1)->paginate(10, ['*'], $this->pageName()),
            'name'=>DB::table('categories')->where('id',$this->categorie)->get()->first()
        ]);
    }
}
