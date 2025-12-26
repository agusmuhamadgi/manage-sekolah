<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;;
use App\Models\Kelas;

class SiswaIndex extends Component
{   
    public $nama_siswa, $kelas_id, $siswa_id;
    public $isOpen = false;

    public function render()
    {
        return view('livewire.siswa-index',[
        'siswa' => Siswa::with('kelas')->get(),
        'daftar_kelas' => Kelas::all(),
        'kelas_siswa' => Kelas::with('siswa')->get()
        ])->layout('layouts.app');
    }

    public function tambah()
    {
        $this->resetInput();
        $this->isOpen = true;
    }

    
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $this->siswa_id = $id;
        $this->nama_siswa = $siswa->nama_siswa;
        $this->kelas_id = $siswa->kelas_id;
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
            'nama_siswa' => 'required',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        Siswa::updateOrCreate(['id' => $this->siswa_id ?: null], [
        'nama_siswa' => $this->nama_siswa,
        'kelas_id' => $this->kelas_id,
        ]);
        
        session()->flash('message', $this->siswa_id ? 'Data siswa diupdate!' : 'Siswa berhasil ditambah!');
        $this->closeModal();
    }

    public function delete($id)
    {
        Siswa::find($id)->delete();
        session()->flash('message', 'Siswa berhasil dihapus.');
    }

    private function resetInput()
    {
        $this->nama_siswa = '';
        $this->kelas_id = '';
        $this->siswa_id = '';
    }

}
