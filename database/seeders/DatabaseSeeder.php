<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
          //  'name' => 'Test User',
          //  'email' => 'test@example.com',
        //]);
        $this->call([
            UserSeeder::class,
            ClienteSeeder::class,
            ProveedorSeeder::class,
            CategoriaSeeder::class,
            ProductoSeeder::class,
            IngresoSeeder::class,
            DetalleIngresoSeeder::class,
            VentaSeeder::class,
            DetalleVentaSeeder::class,
        ]);
    }
}
