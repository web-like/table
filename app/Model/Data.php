<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Data extends Model {

    protected $table = 'datas';
    protected $guarded = [];

    const DATA_TYPE_BP_500 = 2; // 标普500

    const DATA_TYPE_CY = 3; // 创业板指
    const DATA_TYPE_ZZ = 4; // 中证500
    const DATA_TYPE_SZ = 5; // 上证50
    const DATA_TYPE_ZX = 6; // 中小板指
    const DATA_TYPE_SHZ = 7; // 深证100
    const DATA_TYPE_HS = 8; // 沪深300
    const DATA_TYPE_SZH = 9; // 上证中盘


    public static function TypeMap() {
        return  [
            '000905.SH' => self::DATA_TYPE_ZZ,
            '000016.SH' => self::DATA_TYPE_SZ,
            '399005.SZ' => self::DATA_TYPE_ZX,
            '399330.SZ' => self::DATA_TYPE_SHZ,
            '000300.SH' => self::DATA_TYPE_HS,
            '399006.SZ' => self::DATA_TYPE_CY,
            '000044.SH' => self::DATA_TYPE_SZH,
        ];
    }

    public static function GetType($key) {
        $array = self::TypeMap();
        return $array[$key] ?? false;
    }


    public static function getData($type) {

        $data = Data::orderBy('date_time','desc')->where('type',$type)->limit(793)->get();

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
        return $send_data;
    }




}
