<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValues;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::create([
            'name_ar'=>'الالوان',
            'name_en'=>'Colors'
        ]);

        AttributeValues::create([
            'attribute_id'=>'1',
            'value_ar'=>'أزرق',
            'value_en'=>'Blue'
        ]);
        AttributeValues::create([
            'attribute_id'=>'1',
            'value_ar'=>'أصفر',
            'value_en'=>'Yellow'
        ]);
        AttributeValues::create([
            'attribute_id'=>'1',
            'value_ar'=>'أحمر',
            'value_en'=>'Red'
        ]);
        AttributeValues::create([
            'attribute_id'=>'1',
            'value_ar'=>'أخضر',
            'value_en'=>'Green'
        ]);
        AttributeValues::create([
            'attribute_id'=>'1',
            'value_ar'=>'وردي',
            'value_en'=>'Pink'
        ]);
        AttributeValues::create([
            'attribute_id'=>'1',
            'value_ar'=>'بنفسجي',
            'value_en'=>'Purple'
        ]);
        AttributeValues::create([
            'attribute_id'=>'1',
            'value_ar'=>'بني',
            'value_en'=>'Brown '
        ]);

        AttributeValues::create([
            'attribute_id'=>'1',
            'value_ar'=>'برتقالي',
            'value_en'=>'Orange'
        ]);

        AttributeValues::create([
            'attribute_id'=>'1',
            'value_ar'=>'ذهبي',
            'value_en'=>'gold'
        ]);

        AttributeValues::create([
            'attribute_id'=>'1',
            'value_ar'=>'فضي',
            'value_en'=>'silver'
        ]);

    }
}
