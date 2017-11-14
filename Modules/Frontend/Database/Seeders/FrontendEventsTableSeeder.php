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

class FrontendEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \Modules\Frontend\Entities\EventTranslation::truncate();
        \Modules\Frontend\Entities\Event::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(\Modules\Frontend\Entities\Event::class)->create([
        ]);
        factory(\Modules\Frontend\Entities\Event::class)->create([
        ]);
        factory(\Modules\Frontend\Entities\Event::class)->create([
        ]);
        factory(\Modules\Frontend\Entities\Event::class)->create([
        ]);
        factory(\Modules\Frontend\Entities\Event::class)->create([
        ]);
        factory(\Modules\Frontend\Entities\Event::class)->create([
        ]);
        factory(\Modules\Frontend\Entities\Event::class)->create([
        ]);
    }
}
