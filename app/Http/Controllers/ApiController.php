<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Image;
use Illuminate\Support\Facades\App;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->s3 = App::make('aws')->createClient('s3');
    }

    use Traits\MailApi;

    public function admin(){
        $data = Image::all();
        return view('administrator')->with('data', $data);
    }
}
