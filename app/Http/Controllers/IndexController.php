<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function show()
    {
        $file = Storage::get('public/data.json');
        $data = json_decode($file, true);

        $elemenTerakhir = end($data);

        return view('page', [
            'data' => $data,
            'r_number' => $elemenTerakhir['id'] + 1
        ]);
    }
}
