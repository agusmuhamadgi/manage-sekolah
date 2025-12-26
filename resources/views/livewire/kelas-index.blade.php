<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow sm:rounded-lg">
            
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Data Kelas</h2>
                <button wire:click="tambah" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                    Tambah Kelas
                </button>
            </div>

            @if (session()->has('message'))
                <div class="mb-4 text-green-600 font-bold p-2 bg-green-50 border border-green-200 rounded">
                    {{ session('message') }}
                </div>
            @endif

            <table class="table-auto w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2 text-left">Nama Kelas</th>
                        <th class="border px-4 py-2 text-center w-1/4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kelas as $kls)
                    <tr>
                        <td class="border px-4 py-2 font-medium">{{ $kls->nama_kelas }}</td>
                        <td class="border px-4 py-2 text-center">
                            <div class="flex justify-center gap-2">
                                <button wire:click="edit({{ $kls->id }})" class="text-blue-500 hover:underline text-sm font-semibold">Edit</button>
                                <button wire:click="delete({{ $kls->id }})" 
                                        wire:confirm="Menghapus kelas akan berdampak pada data siswa/guru di kelas ini. Yakin?" 
                                        class="text-red-500 hover:underline text-sm font-semibold">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="border px-4 py-2 text-center text-gray-400 italic">Belum ada data kelas.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            @if($isOpen)
            <div class="fixed inset-0 flex items-center justify-center z-50">
                <div class="fixed inset-0 bg-black opacity-50" wire:click="closeModal"></div>
                <div class="bg-white rounded-lg p-8 z-50 w-full max-w-md mx-auto shadow-xl">
                    <h2 class="text-xl font-bold mb-4">{{ $kelas_id ? 'Edit Kelas' : 'Tambah Kelas' }}</h2>
                    
                    <form wire:submit.prevent="simpan">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                            <input type="text" wire:model="nama_kelas"
                                   class="mt-1 border w-full p-2 rounded focus:ring-blue-500">
                            @error('nama_kelas') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="flex justify-end gap-2">
                            <button type="button" wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                {{ $kelas_id ? 'Update' : 'Simpan' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>