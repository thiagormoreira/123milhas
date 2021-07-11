<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    public function response($data, $status)
    {
        return response()->json($data, $status);
    }
}
