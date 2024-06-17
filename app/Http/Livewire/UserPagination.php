<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Livewire\Component;

class UserPagination extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    /**
     * Write code on Method
     *
     * @return response()
     */
    public $pageName = 'produits';
    public $pagination=4;

    
    public function render()
    {
        $categories=DB::table('categories')->where('categories.display',1)->get('id');
        $array = json_decode(json_encode($categories), true);
        $products=DB::table('price_nationals as n')->orderBy('n.date','desc')->where('id_type',2)->join('products as p','p.id','=','n.id_product')->whereIn('p.id_category',$array)->where('p.display',1)->where('path_image','<>','null')->where('path_image','<>',null)
        ->where('with_image',1)
        ->get()->unique('id_product');

        return view('livewire.user-pagination',[
            'products' => $products,
            'pagination'=>$this->value
        ]);
    }
}
