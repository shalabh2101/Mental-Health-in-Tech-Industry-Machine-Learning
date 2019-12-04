<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PredictionController extends Controller
{
    public static function predictTreatmentRequirement($survey_result)
    {
        $server_url = env('ML_SERVER_URL');
        try{

            $client = new Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

            $res = $client->post($server_url . '/health',
                ['body' => json_encode($survey_result)]
            );

            $treatment_status = json_decode($res->getBody(),true);

            $network_error = false;
            return $treatment_status;
        }
        catch (\Exception $e)
        {
            $network_error = true;
        }
    }
}
