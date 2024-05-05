<?php

namespace Database\Seeders;

use App\Models\ModalCrud;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModalCrudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModalCrud::factory()->count(4)->create();
    }
}
