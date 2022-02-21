<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'logo' => 'images/setting/2021111663103193630.png',
            'site_name_ar' => 'الاسم بالعربيه',
            'site_name_en' => 'name in english',
            'phone' => '8484858845855',
            'facebook' => 'https://www.facebook.com',
            'instagram' => 'https://www.instagram.com',
            'email' => 'info@eggs-plus.com',
            'location_ar' => 'مول الصفوة الدور الثاني',
            'location_en' => 'مول الصفوة الدور الثاني',
            'whatsapp' => '01095414200',
            'description_ar' => 'الوصف بالعربيه',
            'description_en' => 'description in english',
            'copyright_ar' => 'كوربي رايت بالعربيه',
            'copyright_en' => 'copyright in english',
        ];


        Setting::setMany($data);
    }
}
