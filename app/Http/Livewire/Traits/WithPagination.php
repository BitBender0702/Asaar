<?php

namespace app\Http\Livewire\Traits;

use Illuminate\Pagination\Paginator;

trait WithPagination
{

    
    public function pageName(): string {
        if (property_exists($this, 'pageName')) {
            if(!isset($this->{$this->pageName})) $this->{$this->pageName} = 1;
            return $this->pageName;
        } else {
            return 'page';
        }
    }
    
    public function getUpdatesQueryString()
    {
        $query = array_merge([$this->pageName => ['except' => 1]], $this->updatesQueryString);
        return $query;
    }

    public function initializeWithPagination()
    {
        $this->{$this->pageName} = $this->resolvePage();

        Paginator::currentPageResolver(function () {
            return $this->{$this->pageName};
        });

        Paginator::defaultView($this->paginationView());
    }

    public function paginationView()
    {
        return 'livewire::pagination-links';
    }

    public function previousPage()
    {
        $this->{$this->pageName} = $this->{$this->pageName} - 1;
    }

    public function nextPage()
    {
        $this->{$this->pageName} = $this->{$this->pageName} + 1;
    }

    public function gotoPage($page)
    { 
        $this->{$this->pageName} = $page;
    }

    public function resetPage()
    {
        $this->{$this->pageName} = 1;
    }

    public function resolvePage()
    {
        // The "page" query string item should only be available
        // from within the original component mount run.
        return request()->query($this->pageName, $this->{$this->pageName});
    }

    public function __get($property) {
        if ($property == $this->pageName || $property == 'page') {
            $page = property_exists($this, $this->pageName) ? $this->{$this->pageName} : 1;
            return $page;
        }
      }

      public function __set($property, $value) {
        if ($property == $this->pageName || $property == 'page') {
            $this->{$this->pageName} = $value;
        }
        return $this;
      }

      public function getPublicPropertiesDefinedBySubClass()
      {
          $data = parent::getPublicPropertiesDefinedBySubClass();
          $data[$this->pageName] = $this->{$this->pageName};
          return $data;
      }
}
?>