<?php

namespace App\Console\Commands\Crawling;

use App\Common\Crawling;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Translation\Tests\StaleResource;

class HSI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawling:HIS';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '抓取HSI的数据';

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
        $url = 'https://www.analystz.hk/options/hsi-pe-dividend-valuation.php';
        $page = Crawling::getPage($url);
        preg_match_all('/Date\\((.*)\\).*pe:(.*)\\,div/',$page,$arr);
        $data = [];
        $date = $arr[1];
        $he = $arr[2];
        $num = count($date);

        for ($i = $num - 1 ; $i > 1800; $i--) {
            $data[] = ['date'=> str_replace(',','-',$date[$i]),'he'=>$he[$i]];
        }
        print_r($data);
//        $this->parsePage($page);
    }

    public function parsePage($page) {
        preg_match_all('/Date\\((.*)\\).*pe:(.*)\\,div/',$page,$arr);
        $data = [];
        $date = $arr[1];
        $he = $arr[2];
        $num = count($date);
//        print_r($he);
//        print_r($num);
        for ($i = $num ; $i > 1700; $i--) {
            echo $i;
            print_r($he[$i]);
            print_r($data[$i]);
            $data[] = ['date'=> str_replace(',','-',$date[$i]),'he'=>$he[$i]];
        }
        print_r($data);
    }



}
