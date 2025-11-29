<?php

$get_requests = isset($_GET['name']) && $_GET['name'] != '' ? $_GET['name'] : '' ;
$response = [];

if($get_requests == 'versions'){
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

    echo json_encode($response);exit;
}
else if($get_requests == 'slider_images'){
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
}

$response = [
    'status'    =>  false,
    'message'   =>  'Please provide particular API name!'
];

echo json_encode($response); exit;


?>