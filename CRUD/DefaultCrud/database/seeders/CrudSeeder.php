<?php

namespace Database\Seeders;

use App\Models\Crud;
use Illuminate\Database\Seeder;

class CrudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Crud::factory()->count(4)->create();
    }
}
