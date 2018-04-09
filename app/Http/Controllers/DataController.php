<?php

namespace App\Http\Controllers;

use App\Model\Data;
use Illuminate\Http\Request;

class DataController extends Controller {

    public function zack() {

        $data = Data::orderBy('date_time','desc')->limit(793)->get();

        $send_data = [
            'day' => round($data[0]->pe,2),
            'week' => round($data->slice(1,5)->avg('pe'), 2),
            'month' => round($data->slice(1,22)->avg('pe'), 2),
            'quarter' => round($data->slice(1,66)->avg('pe'),2),
            'half_a_year' => round($data->slice(1,132)->avg('pe'),2),
            'year' => round($data->slice(1,264)->avg('pe'),2),
            'two_year' => round($data->slice(1,528)->avg('pe'),2),
            'three_year' => round($data->slice(1,792)->avg('pe'),2),
            '70_month' => round($data->slice(0, 22)->sortByDesc('pe')->slice(0, 7)->avg('pe'),2),
            '70_quarter' => round($data->slice(0, 66)->sortByDesc('pe')->slice(0, 20)->avg('pe'),2),
            '70_half_a_year' => round($data->slice(0, 132)->sortByDesc('pe')->slice(0, 40)->avg('pe'),2),
            '70_year' => round($data->slice(0, 264)->sortByDesc('pe')->slice(0, 79)->avg('pe'),2),
            '70_two_year' => round($data->slice(0, 528)->sortByDesc('pe')->slice(0, 158)->avg('pe'),2),
            '70_three_year' => round($data->slice(0, 792)->sortByDesc('pe')->slice(0, 238)->avg('pe'),2),
            '30_month' => round($data->slice(0, 22)->sortBy('pe')->slice(0, 7)->avg('pe'),2),
            '30_quarter' => round($data->slice(0, 66)->sortBy('pe')->slice(0, 20)->avg('pe'),2),
            '30_half_a_year' => round($data->slice(0, 132)->sortBy('pe')->slice(0, 40)->avg('pe'),2),
            '30_year' => round($data->slice(0, 264)->sortBy('pe')->slice(0, 79)->avg('pe'),2),
            '30_two_year' => round($data->slice(0, 528)->sortBy('pe')->slice(0, 158)->avg('pe'),2),
            '30_three_year' => round($data->slice(0, 792)->sortBy('pe')->slice(0, 238)->avg('pe'),2),
        ];



        return view('zack',compact('send_data'));
    }


}
