<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithPagination;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Product;

class ViandeoeufPagination extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $pageName = 'v&o';
    public function render()
    {
        return view('livewire.viandeoeuf-pagination' ,[            
            
            'regions'=>DB::table('regions')->where('regions.display', 1)->limit(5)->get(),
             'voeufs'=>DB::table("products")
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
             ->whereIn('products.id_category', [9,10])->where('products.display', 1)->paginate(10, ['*'], $this->pageName()),
            
        ]);
    }
}
