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

        
        
        $data = [];
        foreach($results as $result) {
            $data[] = $this->normalizeData($result);
        }

        return response()->json($data);
    }
    
    
    public function Random()
    {
        $id = DB::table('ctt')
                ->select('id')
                ->inRandomOrder()
                ->first();

        $result = DB::table('ctt')
            ->leftJoin('districts', 'ctt.district_id', '=', 'districts.district_id')
            ->leftJoin('locations', 'ctt.location_id', '=', 'locations.location_id')
            ->leftJoin('municipalities', function ($join) {
                $join->on('ctt.municipality_id', '=', 'municipalities.municipality_id')->
                on('municipalities.district_id', '=', 'ctt.district_id');
                })
            ->select('locations.name', 'districts.name AS district', 'municipalities.name AS municipality', 'ctt.*')
            ->where('ctt.id', $id->id)->first();

        return response()->json($this->normalizeData($result));
    }
    
    protected function normalizeData($result)
    {
        $fullAddress = [];
            if(!empty(trim($result->art_tipo))) {
                $fullAddress[] = trim($result->art_tipo);
            }
            
            if(!empty(trim($result->pri_prep))) {
                $fullAddress[] = trim($result->pri_prep);
            }
            
            if(!empty(trim($result->art_titulo))) {
                $fullAddress[] = trim($result->art_titulo);
            }
            
            if(!empty(trim($result->seg_prep))) {
                $fullAddress[] = trim($result->seg_prep);
            }
            
            if(!empty(trim($result->art_desig))) {
                $fullAddress[] = trim($result->art_desig);
            }
            
            if(!empty(trim($result->porta))) {
                $fullAddress[] = trim($result->porta);
            }
            
            return [
                'locationName' => trim($result->name),
                'fullAddress' => implode(' ', $fullAddress),
                'zone' => trim($result->art_local),
                'section' => trim($result->troco),
                'doorNumber' => trim($result->porta),
                'clientName' => trim($result->cliente),
                'cp4' => trim($result->cp4),
                'cp3' => trim($result->cp3),
                'cpalf' => trim($result->cpalf),
                'districtName' => trim($result->district),
                'municipalityName' => trim($result->municipality),
                'latitude' => $result->latitude,
                'longitude' => $result->longitude,
            ];
    }
    
}

