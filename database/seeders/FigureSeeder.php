<?php

namespace Database\Seeders;

use App\Models\Figure;
use Illuminate\Database\Seeder;

class FigureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Figure::factory()->count(20)->create();
    }
}
