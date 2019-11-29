<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function dashboard()
    {
        if (Auth::user()) {

            $client = new Client();
            $appointments = null;
            $server_url = env('SERVER_URL');
            try{

                $res = $client->get($server_url . '/donation/all', []);
                $appointments = json_decode($res->getBody(),true);
                $network_error = false;

                if($appointments['status'] == true)
                {
                    $appointments = $appointments['blood_donations'];

                    $upcoming = 0;
                    $completed = 0;
                    $cancelled = 0;
                    foreach ($appointments as $key => $appointment)
                    {
                        if($appointment['status'] == "OPEN")
                            $upcoming++;
                        elseif ($appointment['status'] == "COMPLETE")
                            $completed++;
                        elseif ($appointment['status'] == "CANCEL")
                            $cancelled++;
                    }
                }
            }
            catch (\Exception $e)
            {
                $upcoming = 0;
                $completed = 0;
                $cancelled = 0;
                $network_error = true;
            }

            return view("dashboard", ['sidenav' => 'dashboard', 'upcoming' => $upcoming, 'completed' => $completed, 'cancelled' => $cancelled, 'network_error' => $network_error]);

        }
        return view("login");
    }
}
