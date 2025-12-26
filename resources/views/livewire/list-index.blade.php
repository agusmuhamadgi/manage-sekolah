<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow sm:rounded-lg">
            
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">List Data Master</h2>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-200 shadow-sm rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                            <th class="border border-gray-200 px-4 py-3 text-left">Daftar Siswa</th>
                            <th class="border border-gray-200 px-4 py-3 text-left w-1/4">Nama Guru</th>
                            <th class="border border-gray-200 px-4 py-3 text-left w-1/5">Kelas</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($kelas as $kls)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="border border-gray-200 px-4 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        @forelse($kls->siswa as $s)
                                            <span class="inline-flex items-center bg-blue-50 text-blue-700 border border-blue-100 px-2.5 py-0.5 rounded-md text-xs font-medium">
                                                {{ $s->nama_siswa }}
                                            </span>
                                        @empty
                                            <span class="text-gray-400 text-xs italic">Belum ada data siswa</span>
                                        @endforelse
                                    </div>
                                </td>
                                
                                <td class="border border-gray-200 px-4 py-4 vertical-align-top">
                                    @forelse($kls->guru as $g)
                                    <div class="flex items-center text-sm text-gray-700 mb-1">
                                        <span class="text-blue-500 mr-2">•</span>
                                        {{ $g->nama_guru }}
                                    </div>
                                    @empty
                                    <span class="text-gray-400 text-xs italic">Belum ada data guru</span>
                                    @endforelse
                                </td>

                                <td class="border border-gray-200 px-4 py-4 font-bold text-gray-900 bg-gray-50/50">
                                    {{ $kls->nama_kelas }}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-10 text-gray-500 italic">
                                    Data master belum tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>