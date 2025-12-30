<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Guru;
use App\Models\Kelas;

class GuruIndex extends Component
{
    public $nama_guru, $kelas_id, $guru_id;
    public $isOpen = false;

    public function render()
    {
        return view('livewire.guru-index', [
            'guru' => Guru::with('kelas')->get(),
            'daftar_kelas' => Kelas::all(),
            'kelas_guru' => Kelas::with('guru')->get()
        ])->layout('layouts.app');
    }

    public function tambah()
    {
        $this->resetInput();
        $this->isOpen = true;
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $this->guru_id = $id;
        $this->nama_guru = $guru->nama_guru;
        $this->kelas_id = $guru->kelas_id;
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
            'nama_guru' => 'required',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        Guru::updateOrCreate(['id' => $this->guru_id ?: null], [
        'nama_guru' => $this->nama_guru,
        'kelas_id' => $this->kelas_id,
       ]);

       session()->flash('message', $this->guru_id ? 'Guru berhasil diupdate!' : 'Guru berhasil ditambah!');
       $this->closeModal();
    }

    public function delete($id)
    {
        Guru::find($id)->delete();
        session()->flash('message', 'Guru berhasil dihapus.');
    }

    public function resetInput()
    {
        $this->nama_guru = '';
        $this->guru_id = '';
        $this->kelas_id = '';
    }
}
