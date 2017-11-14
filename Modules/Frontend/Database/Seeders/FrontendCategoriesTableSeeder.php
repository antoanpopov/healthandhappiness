<?php
/**
 * Created by PhpStorm.
 * User: Antoan Popov <antoanpopoff@gmail.com>
 * Date: 9.10.2017 г.
 * Time: 16:39
 */

namespace Modules\Frontend\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrontendCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \Modules\Frontend\Entities\CategoryTranslation::truncate();
        \Modules\Frontend\Entities\Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(\Modules\Frontend\Entities\Category::class)->create([
            'title:bg' => 'Позитивна психология',
            'title:en' => 'Positive Psychology',
        ]);
        factory(\Modules\Frontend\Entities\Category::class)->create([
            'title:bg' => 'Природна хигиена и здраве',
            'title:en' => 'Natural hygiene and health',
        ]);
        factory(\Modules\Frontend\Entities\Category::class)->create([
            'title:bg' => 'Здравословен начин на живот',
            'title:en' => 'Healthy lifestyle',
        ]);
        factory(\Modules\Frontend\Entities\Category::class)->create([
            'title:bg' => 'Изкуството да се храним здравословно',
            'title:en' => 'The art of eating healthy',
        ]);
        factory(\Modules\Frontend\Entities\Category::class)->create([
            'title:bg' => 'Кристал рейки',
            'title:en' => 'Crystal reiki',
        ]);
        factory(\Modules\Frontend\Entities\Category::class)->create([
            'title:bg' => 'Релакс',
            'title:en' => 'Relax',
        ]);
    }
}
