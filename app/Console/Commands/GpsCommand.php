<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Sunra\PhpSimple\HtmlDomParser;

class GpsCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'pixel:gps';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import GPS coords.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        
        $results = app('db')->select("SELECT cp4, cp3 FROM ctt LIMIT 100");
        
        foreach($results as $result) {
            
            echo($result->cp4.'-'.$result->cp3."\n");
        }
        
        
        return;
        
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://');
        $body = (string)$res->getBody();

        $dom = HtmlDomParser::str_get_html($body);
        

        $gps = $dom->find('span[class="pull-right gps"]',0)->innertext;
        if($gps) {
            
            $gps = trim(str_replace('<b>GPS:</b>','',$gps));
            
            list($lat, $long) = explode(',',$gps);
            
            
        }
        
        echo($lat.'/'.$long);
    }

}
