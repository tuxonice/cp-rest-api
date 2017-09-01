<?php

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    
    public function Index(Request $request, $cp3, $cp4)
    {
        $results = DB::table('ctt')
            ->leftJoin('districts', 'ctt.district_id', '=', 'districts.district_id')
            ->leftJoin('locations', 'ctt.location_id', '=', 'locations.location_id')
            ->leftJoin('municipalities', function ($join) {
                $join->on('ctt.municipality_id', '=', 'municipalities.municipality_id')->
                on('municipalities.district_id', '=', 'ctt.district_id');
                })
            ->select('locations.name', 'districts.name AS district', 'municipalities.name AS municipality', 'ctt.*')
            ->where([
                ['ctt.cp4', '=', $cp4],
                ['ctt.cp3', '=', $cp3],
                 ])->get();
          
          
        $data = $results;
        return response()->json($data);
    }
    
}

