<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class CustomController extends Controller
{
    /**
     * Return a simple Hello World response
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'Hello World!!!'
        ], 200);
    }

    public function versions(): JsonResponse
    {
        $android = [
            'min_version'   => 1.0,
            'max_version'   => 5.0,
            'store_link'    => '',
            'message'       =>  'Please update the app to the latest version!'
        ];

        $ios = [
            'min_version'   => 1.0,
            'max_version'   => 5.0,
            'store_link'    =>  '',
            'message'       =>  'Please update the app to the latest version!'
            
        ];

        $data_arr = [
            'android'   =>  $android, 
            'ios'       =>  $ios
        ];

        $response = [
            'status'    =>  true,
            'message'   =>  'Data found!',
            'data'      =>  $data_arr
        ];

        return response()->json($response, 200);
    }

    public function slider_images(): JsonResponse
    {
        $data_arr = [
            [
                'url'   =>  'https://selena.co.in/wp-content/uploads/2024/06/19-03-2024-01-scaled.jpg',
                'type'  =>  'image'
            ],
            [
                'url'   =>  'https://selena.co.in/wp-content/uploads/2024/06/30-04-20244-01-scaled.jpg',
                'type'  =>  'image'
            ],
            [
                'url'   =>  'https://selena.co.in/wp-content/uploads/2024/06/29-05-2024-01-scaled.jpg',
                'type'  =>  'image'
            ],
            [
                'url'   =>  'https://selena.co.in/wp-content/uploads/2024/06/26-04-2024-01-scaled.jpg',
                'type'  =>  'image'
            ],
            [
                'url'   =>  'https://selena.co.in/wp-content/uploads/2024/06/23-04-202444-01-scaled.jpg',
                'type'  =>  'image'
            ],
        ];

        $response = [
            'status'    =>  true,
            'message'   =>  'Data found!',
            'data'      =>  $data_arr
        ];

        return response()->json($response, 200);
    }

    public function custom_pages(): JsonResponse
    {
        $data_arr = DB::table('cms_page_translations')->get();

        $response = [
            'status'    =>  true,
            'message'   =>  'Data found!',
            'data'      =>  $data_arr
        ];

        return response()->json($response, 200);
    }
}
