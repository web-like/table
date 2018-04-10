<?php

namespace App\Http\Controllers;

use App\Model\Data;
use Illuminate\Http\Request;

class DataController extends Controller {

    public function zack($type = 2) {
        $send_data = Data::getData($type);
        return view('zack',compact('send_data'));
    }







}
