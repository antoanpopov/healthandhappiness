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
use Illuminate\Support\Facades\File;

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

        $images = File::files(storage_path('media'));
        $imagesCount = count($images) - 1;

        factory(\Modules\Frontend\Entities\Event::class)->create([
        ])->addMedia($images[rand(0, $imagesCount)]->getRealPath())
            ->preservingOriginal()
            ->toMediaCollection('COVER_IMAGE');
        factory(\Modules\Frontend\Entities\Event::class)->create([
        ])->addMedia($images[rand(0, $imagesCount)]->getRealPath())
        ->preservingOriginal()
        ->toMediaCollection('COVER_IMAGE');
        factory(\Modules\Frontend\Entities\Event::class)->create([
        ])->addMedia($images[rand(0, $imagesCount)]->getRealPath())
            ->preservingOriginal()
            ->toMediaCollection('COVER_IMAGE');
        factory(\Modules\Frontend\Entities\Event::class)->create([
        ])->addMedia($images[rand(0, $imagesCount)]->getRealPath())
            ->preservingOriginal()
            ->toMediaCollection('COVER_IMAGE');
        factory(\Modules\Frontend\Entities\Event::class)->create([
        ])->addMedia($images[rand(0, $imagesCount)]->getRealPath())
            ->preservingOriginal()
            ->toMediaCollection('COVER_IMAGE');
        factory(\Modules\Frontend\Entities\Event::class)->create([
        ])->addMedia($images[rand(0, $imagesCount)]->getRealPath())
            ->preservingOriginal()
            ->toMediaCollection('COVER_IMAGE');
        factory(\Modules\Frontend\Entities\Event::class)->create([
        ])->addMedia($images[rand(0, $imagesCount)]->getRealPath())
            ->preservingOriginal()
            ->toMediaCollection('COVER_IMAGE');
    }
}
