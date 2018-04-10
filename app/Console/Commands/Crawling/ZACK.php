<?php

namespace App\Console\Commands\Crawling;

use App\Common\Crawling;
use App\Model\Data;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ZACK extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawling:zack';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'zack数据抓取';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $url = 'https://widget3.zacks.com/data/chart/json/SPAL/pe_ratio/www.zacks.com';
        $data = Crawling::getPage($url);
        $data = json_decode($data,true);

        foreach ($data['daily_pe_ratio'] as $k => $v){
            if ($v == 'N/A') {
                continue;
            }
            $arr_time = explode('/',$k);
            $time = '20' . $arr_time[2] . '-' . $arr_time[0] . '-' . $arr_time[1];
            $date_time = Carbon::parse($time)->timestamp;
            $type = Data::DATA_TYPE_BP_500;

            $dataObj = Data::where('date_time',$date_time)->where('type',$type)->first();
            if (!is_null($dataObj)) {
                break;
            }

            $arr = [
                'date_time' => $date_time,
                'pe'   => $v,
                'type' => $type,
            ];
            Data::create($arr);
        }


    }
}
