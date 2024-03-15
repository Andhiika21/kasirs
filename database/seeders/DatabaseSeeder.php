<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Laporan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        Role::create([
            'role_name' => 'superadmin',
        ]);

        Role::create([
            'role_name' => 'pegawai',
        ]);

        Role::create([
            'role_name' => 'kasir',
        ]);

        Laporan::create([
            'tanggal' => date('Y-m-d'),
            'pemasukan' => 0,
            'pengeluaran' => 0,
            'keuntungan' => 0
        ]);
        
        User::factory(6)->create();
    }
}
