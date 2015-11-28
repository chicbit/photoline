<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Image;

class ApiController extends Controller
{
    use Traits\MailApi;

    public function admin(){
        $data = Image::all();
        return view('administrator')->with('data', $data);
    }
}
