<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

trait Helper
{
     public static function getEnumValues($col)
     {
          $v = explode("','", substr(DB::select(DB::raw('SHOW COLUMNS FROM ' . (new static)->getTable() . ' WHERE Field = "' . $col . '"'))[0]->Type, 6, -2));
          return [$col => $v];
     }

     public static function getEveryEnumValues()
     {
          $cols = collect(DB::select(DB::raw("SHOW COLUMNS FROM " . (new static)->getTable())));
          $values = [];
          foreach ($cols as $col) {
               if (substr($col->Type, 0, 4) == 'enum') {
                    $values += [$col->Field => explode("','", substr($col->Type, 6, -2))];
               }
          }
          return $values;
     }
}
