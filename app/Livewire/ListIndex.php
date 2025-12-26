<?php

namespace App\Livewire;

use Livewire\Component;

class ListIndex extends Component
{
    public function render()
    {   

        return view('livewire.list-index',[
            'kelas' => \App\Models\Kelas::with(['guru', 'siswa'])->get()
        ])->layout('layouts.app');
    }
}
