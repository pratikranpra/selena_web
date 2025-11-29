<?php

namespace Custom\Apis\Http\Controllers;

use Illuminate\Routing\Controller;

class ApisController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'hello world'
        ]);
    }
}
