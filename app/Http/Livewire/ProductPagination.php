<?php
 
namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithPagination;
use Illuminate\Http\Request;
use Livewire\Component;
 
class ProductPagination extends Component
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
   	public $idType;
    public function render()
 
    {
       
 	    $this->emit('postAdded');

		$q_group_list = array();
		$product_ids = array();
		$regionsId = array();
 
		$quantity_group_list = DB::table("products")->select("products.*", 
				DB::raw("CONCAT(COALESCE(price_by_regions.moyen, tbl.moyen), ';', price_by_regions.id_region ) as quantity_group"))
		->leftJoin(DB::raw("(SELECT price_by_regions.id_product, AVG(price_by_regions.moyen) as moyen, price_by_regions.id_region
							FROM price_by_regions
							WHERE id_type = $this->idType AND date BETWEEN DATE_SUB((SELECT MAX(date) FROM price_by_regions), INTERVAL 3 DAY) AND (SELECT MAX(date) FROM price_by_regions)
							GROUP BY price_by_regions.id_product, price_by_regions.id_region) as tbl"), function ($join) {
			$join->on("tbl.id_product", "=", "products.id");
		})
		->leftJoin("price_by_regions", function ($join) {
			$join->on("price_by_regions.id_product", "=", "products.id")
				->on("price_by_regions.date", "=", DB::raw("(SELECT MAX(date) FROM price_by_regions)"));
		})
		->where('products.id_category', $this->categorie)
		->where('price_by_regions.id_type', $this->idType) // modified by Kris
		->groupBy("products.id", "price_by_regions.id_region")->get();		

		foreach ($quantity_group_list as $key => $product) {
			if (!in_array($product->id, $product_ids)) {
				array_push($product_ids, $product->id);
				$q_group_list[$product->id] = array();
			}

			array_push($q_group_list[$product->id], $product->quantity_group);

			if($product->quantity_group != NULL) {
				$quantity_group = $product->quantity_group;
				$quantity_group = explode(",", $quantity_group);
				
				foreach($quantity_group as $quantity) {
					$quantity = explode(";", $quantity);
					array_push($regionsId, $quantity[1]);
				}
			}
		}

       	$products = DB::table("products")->where('display', 1)->where('id_category', $this->categorie)->whereIn('id', $product_ids)->paginate(10, ['*'], $this->pageName());
		
		foreach ($products as $key => $value) {
			$products[$key]->quantity_group_list = $q_group_list[$value->id];
		}

        return view('livewire.product-pagination',[
            
            'fruits'=> $products,
            'regionsId'=>$regionsId,
            'regions'=>DB::table('regions')->where('regions.display', 1)->whereIn('regions.id',$regionsId)->get(),
            'name'=>DB::table('categories')->where('id',$this->categorie)->get()->first()
        ]);
    }
}