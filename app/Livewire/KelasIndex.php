<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas;

class KelasIndex extends Component
{
    public $nama_kelas, $kelas_id;
    public $isOpen = false;
    
    public function render()
    {   

        return view('livewire.kelas-index',[
            'kelas' => Kelas::with('siswa')->get()
        ])->layout('layouts.app');
    }

    public function tambah()
    {
        $this->resetInput();
        $this->isOpen = true;
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
        $this->kelas_id = $id;
        $this->nama_kelas = $kelas->nama_kelas;
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInput();
    }

    public function simpan()
    {
        $this->validate([
            'nama_kelas' => 'required',
        ]);

        Kelas::updateOrCreate(['id' => $this->kelas_id ?: null], [
        'nama_kelas' => $this->nama_kelas,
        ]);
        
        session()->flash('message', $this->kelas_id ? 'Kelas diupdate!' : 'Kelas ditambahkan!');
        $this->closeModal();
    }

    public function delete($id)
    {
        Kelas::find($id)->delete();

        session()->flash('message', 'Kelas berhasil dihapus.');
    }

    private function resetInput()
    {
        $this->nama_kelas = '';
        $this->kelas_id = '';
    }

}
