<?php

namespace App\Http\Controllers;

class DebugController extends Controller
{
    public function index()
    {
        $data = [
            'framework' => 'Laravel',
            'language'  => 'PHP',
            'database'  => 'MySQL',
        ];

        // dd($data);   <- used in 6.3, commented out in 6.5 clean up

        return $data;
    }
}
