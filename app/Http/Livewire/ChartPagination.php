<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithPagination;

class ChartPagination extends Component
{
    use WithPagination;
    public $pageName='CategoriesProd';
    public $perPage = 2;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];
    public $typePrice=1;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $categories=DB::table('categories')->latest()->where('categories.display', 1)->get();
        $this->emit('userStore');
        $productsByCategorie=DB::table('products')->latest()->where('products.display', 1)->get();
        $latestdate=DB::table('price_nationals')->orderBy('date','DESC')->first()->date;
        $marches = DB::table('types')->where('types.display',1)->get();
        return view('livewire.chart-pagination', ['categories' => $categories,'productsByCategorie' => $productsByCategorie,'date'=>$latestdate,'marches'=>$marches]);
    }
   
}