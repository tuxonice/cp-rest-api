<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    
    public function Index(Request $request)
    {
        return View('index', ['host' => $request->getSchemeAndHttpHost()]);
    }

}
