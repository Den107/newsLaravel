<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected array $newsList = [
        [
            'id' => 1,
            'title' => 'News1',
            'description' => 'News 1'
        ],
        [
            'id' => 2,
            'title' => 'News2',
            'description' => 'News 2'
        ],
        [
            'id' => 3,
            'title' => 'News3',
            'description' => 'News 3'
        ]
    ];

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
