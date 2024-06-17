<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Livewire\Component;

class CarousselPagination extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    /**
     * Write code on Method
     *
     * @return response()
     */
    public $pageName = 'produits';
 
    
    public function render()
    {
    
        $categories=DB::table('categories')->where('categories.display',1)->get('id');
        $marches=DB::table('types')->where('types.display',1)->get();
        $array = json_decode(json_encode($categories), true);
        $products=DB::table('price_nationals as n')->join('products as p','p.id','=','n.id_product')->where('id_type',2)->whereIn('p.id_category',$array)->where('p.display',1)->where('path_image','<>','null')->where('path_image','<>',null)
        ->where('with_image',1)
        ->groupBy(['id_product','id_type'])
        ->where('n.date',DB::table('price_nationals')->max('date'))
        ->get(["n.*","p.*","id_type as type_id"]);
        return view('livewire.caroussel-pagination',[
            'products' => $products,
            'marches'=>$marches,
        ]);
    }
}
