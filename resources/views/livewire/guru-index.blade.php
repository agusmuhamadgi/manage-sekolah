<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow sm:rounded-lg">
            
           <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Data Guru</h2>
                <button wire:click="tambah" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                     Tambah Guru
                </button>
            </div>

            <table class="table-auto w-full border">
    <thead>
        <tr class="bg-gray-100">
            <th class="border px-4 py-2 text-left">Kelas</th>
            <th class="border px-4 py-2 text-left">Nama Guru</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kelas_guru as $kg)
        <tr>
            <td class="border px-4 py-2 font-bold">{{ $kg->nama_kelas }}</td>
            <td class="border px-4 py-2">
                @forelse($kg->guru as $g)
                    <div class="flex justify-between items-center border-b last:border-0 py-2">
                        <span>• {{ $g->nama_guru }}</span>
                        
                        <div class="flex gap-2">
                            <button wire:click="edit({{ $g->id }})" 
                                    class="text-blue-500 hover:text-blue-700 text-xs font-semibold">
                                Edit
                            </button>

                            <button wire:click="delete({{ $g->id }})" 
                                    wire:confirm="Apakah Anda yakin ingin menghapus guru ini?"
                                    class="text-red-500 hover:text-red-700 text-xs font-semibold">
                                Hapus
                            </button>
                        </div>
                    </div>
                @empty
                    <span class="text-gray-400 italic text-sm">Belum ada guru</span>
                @endforelse
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

            @if($isOpen)
            <div class="fixed inset-0 flex items-center justify-center z-50">
                <div class="fixed inset-0 bg-black opacity-50"></div>
                <div class="bg-white rounded-lg p-8 z-50 w-full max-w-md mx-auto">
                    <h2 class="text-xl font-bold mb-4">{{ $guru_id ? 'Edit Guru' : 'Tambah Guru' }}</h2>
                    
                    <form wire:submit.prevent="simpan">
                        <div class="mb-4">
                            <label class="block">Nama Guru</label>
                            <input type="text" wire:model="nama_guru" class="border w-full p-2 rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block">Pilih Kelas</label>
                            <select wire:model="kelas_id" class="border w-full p-2 rounded">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($daftar_kelas as $kls)
                                    <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="button" wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>