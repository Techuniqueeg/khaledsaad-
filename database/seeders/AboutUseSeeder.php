<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'name_ar' => '',
            'name_en' => '',
            'description_ar' => '',
            'description_en' => '',
            'image' => '',
        ]);
    }
}
