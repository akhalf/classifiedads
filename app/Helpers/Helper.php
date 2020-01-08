<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Helper
{
    public static function slug($string, $separator = '-')
    {
        if (is_null($string)) return "";

        // Remove spaces from the beginning and from the end of the string
        $string = trim($string);

        // Make alphanumeric (removes all other characters) && keeps latin characters and arabic charactrs
        $string = preg_replace("/[^a-z0-9_\s\-۰۱۲۳۴۵۶۷۸۹يءاأإآؤئبپتثجچحخدذرزژسشصضطظعغفقکكگگلمنوهیة]/u", '', $string);

        // Remove multiple dashes or whitespaces
        $string = preg_replace("/[\s\-_]+/", ' ', $string);

        // Convert whitespaces and underscore to the given separator
        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }

    public static function uniqueSlug($slug, $table)
    {
        $slug=trim($slug);

        $items=DB::table($table)->select('slug')->whereRaw("slug like '$slug%'")->get();

        if(sizeof($items)){
            foreach($items as $item){
                $data[] = $item->slug;
            }

            $count = 0;
            $slug_str = $slug;
            while( in_array(($slug_str), $data) ){
                $slug_str = $slug . '-' . ++$count ;
            }
            return $slug_str;
        }

        return $slug;
    }

}
