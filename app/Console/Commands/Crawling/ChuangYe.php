<?php

namespace App\Console\Commands\Crawling;

use App\Common\Crawling;
use App\Model\Data;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ChuangYe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawling:cy {date?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创业扳指';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        // 处理参数
        $date = $this->argument('date');

        if ('all' === trim($date)) {
            $day = Carbon::now()->subYear(3)->subDay();
            while (true) {
                if ($day->isTomorrow()){
                    break;
                }
                $this->createData($day);
                $day->addDay();
                $this->info($day->format('Y-m-d'));
            }
            return;
        }

        if (is_null($date)) {
            $date = Carbon::now();
        } else {
            $date = Carbon::parse($date);
        }

        $this->createData($date);
    }



    private function createData (Carbon $date) {

        if (!$this->validatorTime($date)) {
            return;
        }

        $url = 'http://www.indexfunds.com.cn/analyse/estimate/index/ratio?indexCodes=000300.SH%2C000016.SH%2C399006.SZ%2C399330.SZ%2C000044.SH%2C399005.SZ%2C000905.SH&date=' . $date->format('Y-m-d');
        $data = (json_decode(Crawling::getPage($url),true));
        if (empty($data)) {
            return;
        }

        foreach ($data as $key => $val) {
            $arrayData = [
                'date_time' => $date->timestamp,
                'pe'   => $val['dynamicPERatio'],
                'type' => Data::GetType($val['indexCode']),
            ];

            if (Data::where('date_time',$arrayData['date_time'])->where('type',$arrayData['type'])->exists()) {
                continue;
            }
            Data::create($arrayData);
        }
    }

    private function validatorTime(Carbon $carbon) {
        return !($carbon->isSunday() || $carbon->isSaturday() || $carbon->isToday());
    }


}
