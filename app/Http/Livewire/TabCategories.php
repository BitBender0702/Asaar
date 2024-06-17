<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TabCategories extends Component
{
    public $idType = 2;
    
    public function updateIdType($idType){
        $this->idType = $idType;
    }
    public function render()
    {
		
        $this->emit('postAdded');
        $categories=DB::table('categories')->where('categories.display',1);
        if($this->idType == 1){
            $categories=$categories->whereIn('categories.id',[6,7,9,10,11]);
        }
        else if($this->idType == 2){
            $categories=$categories->whereIn('categories.id',[6,7,10]);
        }
        else if($this->idType == 3){
            $categories=$categories->whereIn('categories.id',[2,8,1]);
        }
        else if($this->idType == 4){
            $categories=$categories->whereIn('categories.id',[6,7,9,3,10,11]);
        }
        else {
            $categories=$categories;
        }
        $categories=$categories->get();

        $marches=DB::table('types')->where('types.display',1)->get();
        return view('livewire.tab-categories',[
            'categories'=>$categories,
            'marches'=>$marches
        ]);
    }
}