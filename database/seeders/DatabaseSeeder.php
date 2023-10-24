<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Jenis::factory()->create([
            'nama' => 'Elektronik'        
        ]);
        \App\Models\Jenis::factory()->create([
            'nama' => 'Pakaian'        
        ]);
        \App\Models\Jenis::factory()->create([
            'nama' => 'Perhiasan'        
        ]);
        \App\Models\Jenis::factory()->create([
            'nama' => 'Makanan'        
        ]);
        \App\Models\Jenis::factory()->create([
            'nama' => 'Minuman'        
        ]);
        \App\Models\User::factory(3)->create();
        \App\Models\Item::factory(4)->create();
    }
}
