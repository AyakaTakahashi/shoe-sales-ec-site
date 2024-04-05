<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_category_names = [
            'メンズ', 'ウィメンズ', 'バッグ＆アクセサリー'
        ];

        $mens_categories = [
            'スニーカー', 'オックスフォード', 'ローファー', 'ブーツ', 'サンダル', 
        ];

        $womens_categories = [
            'スニーカー', 'パンプス', 'バレエシューズ', 'フラット', 'ブーティ', 
        ];

        $accessory_categories = [
            'バッグ', '財布', 'アパレル', 'ソックス' 
        ];

        foreach ($major_category_names as $major_category_name) {
            if ($major_category_name == 'メンズ') {
                foreach ($mens_categories as $mens_category) {
                    Category::create([
                        'name' => $mens_category,
                        'description' => $mens_category,
                        'major_category_name' => $major_category_name,
                    ]);
                }
            }

            if ($major_category_name == 'ウィメンズ') {
                foreach ($womens_categories as $womens_category) {
                    Category::create([
                        'name' => $womens_category,
                        'description' => $womens_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }

            if ($major_category_name == 'バッグ＆アクセサリー') {
                foreach ($accessory_categories as $accessory_category) {
                    Category::create([
                        'name' => $accessory_category,
                        'description' => $accessory_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }
        }
    }
}
