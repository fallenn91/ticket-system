<?php

namespace Database\Seeders;

use App\Models\itemCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        itemCategory::firstOrCreate(['name' => 'RRHH']);
        itemCategory::firstOrCreate(['name' => 'Electronics']);
        itemCategory::firstOrCreate(['name' => 'Web']);
    }
}
