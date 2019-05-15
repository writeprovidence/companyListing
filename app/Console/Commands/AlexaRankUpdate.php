<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\AlexaLog;
use App\Models\Company;

class AlexaRankUpdate extends Command
{
    public $resp = [];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alexa:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Alexa details for approved companies';

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
    public function handle()
    {
        $companies = Company::whereIsPublic(1)->get();

        foreach ($companies as $company) {

            $data = $this->getDataFromAlexaBy($company->website);
            $company->update($data);

            $alexa = AlexaLog::whereCompanyId($company->id)->first();

            if($alexa->count() == 1){
                $alexa->updata($data);
            }else{
                Alexa::create($data);
            }
        }

        $this->info('Done Updating alexa ranks');
    }

    public function getDataFromAlexaBy($website)
    {
        $dataObject = simplexml_load_string(file_get_contents('http://data.alexa.com/data?cli=10&dat=snbamz&url=farmsponsor.com.ng'));
        $response = json_decode(json_encode($dataObject), true);
        $response = $response['SD'];

        $count = 1;
        foreach($response as $r){
            if($count == 2){
                $this->resp = $r;
            }
            $count++;
        }

        $data['alexa_global_rank'] = $this->resp['REACH']["@attributes"]['RANK'];
        $data['alexa_top_country_id'] = $this->resp['COUNTRY']["@attributes"]['RANK'];
        $data['alexa_country_rank'] = $this->resp['COUNTRY']["@attributes"]['CODE'];

        return $data;
    }
}
