<?php
/**
 * Created by PhpStorm.
 * User: Antoan Popov <antoanpopoff@gmail.com>
 * Date: 9.10.2017 г.
 * Time: 19:34
 */
namespace Modules\Dashboard\Helpers;

use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

class Images {

    public static function getCountryFlags(){

        $dir = public_path('images/flags');
        $files = File::allFiles($dir);
        $flags = [];

        foreach ($files as $file){
            if($file instanceof SplFileInfo){
                $tmpFlag = [];
                $tmpName = str_replace('.'.$file->getExtension(),'',$file->getFilename());
                $tmpName = str_replace(['-','_'],' ',$tmpName);
                $tmpFlag['name'] = $tmpName;
                $tmpFlag['image'] = $file->getFilename();
                $flags[] = $tmpFlag;
            }
        }

        return $flags;
    }

}
