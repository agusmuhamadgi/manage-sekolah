<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow sm:rounded-lg">
            
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Data Siswa</h2>
                <button wire:click="tambah" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                     Tambah Siswa
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
                        <th class="border px-4 py-2 text-left w-1/4">Kelas</th>
                        <th class="border px-4 py-2 text-left">Daftar Siswa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelas_siswa as $ks)
                    <tr>
                        <td class="border px-4 py-2 font-bold bg-gray-50">{{ $ks->nama_kelas }}</td>
                        <td class="border px-4 py-2">
                            <div class="grid grid-cols-1 gap-2">
                                @forelse($ks->siswa as $s)
                                    <div class="flex justify-between items-center bg-white border border-gray-100 p-2 rounded shadow-sm">
                                        <span>{{ $s->nama_siswa }}</span>
                                        <div class="flex gap-2">
                                            <button wire:click="edit({{ $s->id }})" class="text-blue-500 hover:underline text-xs">Edit</button>
                                            <button wire:click="delete({{ $s->id }})" 
                                                    wire:confirm="Yakin hapus siswa ini?" 
                                                    class="text-red-500 hover:underline text-xs">Hapus</button>
                                        </div>
                                    </div>
                                @empty
                                    <span class="text-gray-400 italic text-sm">Belum ada siswa di kelas ini</span>
                                @endforelse
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($isOpen)
            <div class="fixed inset-0 flex items-center justify-center z-50">
                <div class="fixed inset-0 bg-black opacity-50" wire:click="closeModal"></div>
                <div class="bg-white rounded-lg p-8 z-50 w-full max-w-md mx-auto shadow-xl">
                    <h2 class="text-xl font-bold mb-4">{{ $siswa_id ? 'Edit Siswa' : 'Tambah Siswa' }}</h2>
                    
                    <form wire:submit.prevent="simpan">
                        <div class="mb-4">
                            <label class="block text-sm font-medium gray-700">Nama Siswa</label>
                            <input type="text" wire:model="nama_siswa" class="mt-1 border w-full p-2 rounded focus:ring-blue-500">
                            @error('nama_siswa') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium gray-700">Pilih Kelas</label>
                            <select wire:model="kelas_id" class="mt-1 border w-full p-2 rounded focus:ring-blue-500">
                                <option value="">Pilih Kelas</option>
                                @foreach($daftar_kelas as $kls)
                                    <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="button" wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow-sm hover:bg-blue-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>