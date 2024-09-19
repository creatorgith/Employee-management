<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lives;

class EditEmploye extends Component
{
    public function mount(){
    }   
    public function render()
    {
        $employes=Lives::paginate(5);
        return view('livewire.edit-employe',['employes'=>$employes]);
    }
}
