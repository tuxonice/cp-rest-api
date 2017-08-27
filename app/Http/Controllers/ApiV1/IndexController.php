<?php

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    
    
    public function Index(Request $request, $cp3, $cp4)
    {
        
        
        
        $results = DB::table('ctt')->where([
                    ['cp4', '=', $cp4],
                    ['cp3', '=', $cp3],
                        ])->get();
        
        
        
        $data = $results;
        
        return response()->json($data);
        
    }
    
}
