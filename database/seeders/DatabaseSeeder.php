<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat User Admin untuk Login
        User::create([
            'name' => 'Agus Admin',
            'email' => 'admin@sekolah.com',
            'password' => Hash::make('password'),
        ]);

        // Buat Data Kelas
        $kelasA = Kelas::create(['nama_kelas' => 'Kelas 10 A']);
        $kelasB = Kelas::create(['nama_kelas' => 'Kelas 10 B']);

        // Buat Data Guru
        Guru::create(['nama_guru' => 'Djajang Nurjaman, S.Kom.', 'kelas_id' => $kelasA->id]);
        Guru::create(['nama_guru' => 'Dr. Bojan Hodak', 'kelas_id' => $kelasA->id]);
        Guru::create(['nama_guru' => 'Indra Tohir, Spd.', 'kelas_id' => $kelasB->id]);

        // Buat Data Siswa
        Siswa::create(['nama_siswa' => 'Agus', 'kelas_id' => $kelasA->id]);
        Siswa::create(['nama_siswa' => 'Ade', 'kelas_id' => $kelasA->id]);
        Siswa::create(['nama_siswa' => 'Muhamad', 'kelas_id' => $kelasB->id]);
    }
}