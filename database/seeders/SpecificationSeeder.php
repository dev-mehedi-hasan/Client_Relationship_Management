<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Specification Background
        DB::table('specific_file_types')->insert([
            'name'  =>  'JPG',
            'price' =>  '0.5',
        ]);

        DB::table('specific_file_types')->insert([
            'name'  =>  'PNG',
            'price' =>  '0.5',
        ]);

        DB::table('specific_file_types')->insert([
            'name'  =>  'PSD',
            'price' =>  '0.5',
        ]);

        DB::table('specific_file_types')->insert([
            'name'  =>  'TIFF',
            'price' =>  '0.5',
        ]);

        // Specific Background
        DB::table('specific_backgrounds')->insert([
            'name'  =>  'while',
            'price' =>  '0.5',
        ]);

        DB::table('specific_backgrounds')->insert([
            'name'  =>  'Keep Existing',
            'price' =>  '0.5',
        ]);

        DB::table('specific_backgrounds')->insert([
            'name'  =>  'Color',
            'price' =>  '0.5',
        ]);

        DB::table('specific_backgrounds')->insert([
            'name'  =>  'Background image',
            'price' =>  '0.5',
        ]);

         // Specific Alignment
         DB::table('specific_alignments')->insert([
            'name'  =>  'Top',
            'price' =>  '0.5',
        ]);

        DB::table('specific_alignments')->insert([
            'name'  =>  'Center',
            'price' =>  '0.5',
        ]);

        DB::table('specific_alignments')->insert([
            'name'  =>  'Bottom',
            'price' =>  '0.5',
        ]);

        // Specific Color Profile
        DB::table('specific_colors')->insert([
            'name'  =>  'sRGB',
            'price' =>  '0.5',
        ]);

        DB::table('specific_colors')->insert([
            'name'  =>  'CMYK',
            'price' =>  '0.5',
        ]);

        DB::table('specific_colors')->insert([
            'name'  =>  'Adobe RGB',
            'price' =>  '0.5',
        ]);

        // Specific DPI
        DB::table('specific_dpis')->insert([
            'name'  =>  '72',
            'price' =>  '0.5',
        ]);

        DB::table('specific_dpis')->insert([
            'name'  =>  '150',
            'price' =>  '0.5',
        ]);

        DB::table('specific_dpis')->insert([
            'name'  =>  '300',
            'price' =>  '0.5',
        ]);

         // Specific Format Size
         DB::table('specific_size_formats')->insert([
            'name'  =>  'squre',
            'price' =>  '0.5',
        ]);

        DB::table('specific_size_formats')->insert([
            'name'  =>  '2:3',
            'price' =>  '0.5',
        ]);

        DB::table('specific_size_formats')->insert([
            'name'  =>  '3:2',
            'price' =>  '0.5',
        ]);

        DB::table('specific_size_formats')->insert([
            'name'  =>  '4:3',
            'price' =>  '0.5',
        ]);

        DB::table('specific_size_formats')->insert([
            'name'  =>  'Custom',
            'price' =>  '0.8',
        ]);

        // Specific Format Size
        DB::table('specific_addons')->insert([
            'name'  =>  'Shadow',
            'price' =>  '0.75',
        ]);

        DB::table('specific_addons')->insert([
            'name'  =>  'Clipping Path',
            'price' =>  '0.25',
        ]);

        DB::table('specific_addons')->insert([
            'name'  =>  'Retouch',
            'price' =>  '0.25',
        ]);

        DB::table('specific_addons')->insert([
            'name'  =>  'Mannequin',
            'price' =>  '0.35',
        ]);

         // Spacification Category
         DB::table('specific_categories')->insert([
            'title'  =>  'Fashion & Apparel',
            'image' =>  '1.png',
        ]);

        DB::table('specific_categories')->insert([
            'title'  =>  'Home Furnishing',
            'image' =>  '2.png',
        ]);

        DB::table('specific_categories')->insert([
            'title'  =>  'Cosmetics & Beauty',
            'image' =>  '3.png',
        ]);

        DB::table('specific_categories')->insert([
            'title'  =>  'Jewelry',
            'image' =>  '4.png',
        ]);

        DB::table('specific_categories')->insert([
            'title'  =>  'Footwear',
            'image' =>  '5.png',
        ]);

        DB::table('specific_categories')->insert([
            'title'  =>  'Other',
            'image' =>  '6.png',
        ]);

    }
}
