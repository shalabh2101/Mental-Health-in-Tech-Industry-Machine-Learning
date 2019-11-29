<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{

    public function getAllAppointments()
    {

        if (!Auth::user()) {
            return view("login");
        }

        $client = new Client();
        $server_url = env('SERVER_URL');

        try{
            $res = $client->get($server_url . '/donation/all', []);
            $appointments = json_decode($res->getBody(),true);
            $appointments = $appointments['blood_donations'];
            $network_error = false;
        }
        catch (\Exception $e)
        {
            $appointments = [];
            $network_error = true;
        }

        //dd($appointments);
        return view("appointments_list",
            [
                'sidenav' => 'appointments',
                'appointments' => $appointments,
                'network_error' => $network_error
            ]);
    }

    public function manageAppointment($id)
    {

        if (!Auth::user()) {
            return view("login");
        }

        $client = new Client();
        $appointment = null;
        $server_url = env('SERVER_URL');
        try{
            $res = $client->get($server_url . '/donation/view/' . $id, []);
            $appointment = json_decode($res->getBody(),true);
            $network_error = false;

            if($appointment['status'] == true)
            {
                $appointment = $appointment['request_info'];
            }
        }
        catch (\Exception $e)
        {
            $network_error = true;
        }

        return view('appointment_manage',
            [
                'sidenav' => 'appointments',
                'appointment' => $appointment,
                'network_error' => false
            ]);
    }

    public function viewAppointment($id)
    {

        if (!Auth::user()) {
            return view("login");
        }

        $client = new Client();
        $appointment = null;
        $server_url = env('SERVER_URL');
        try{
            $res = $client->get($server_url . '/donation/view/' . $id, []);
            $appointment = json_decode($res->getBody(),true);
            $network_error = false;

            if($appointment['status'] == true)
            {
                $appointment = $appointment['request_info'];
            }
        }
        catch (\Exception $e)
        {
            $network_error = true;
        }

        return view('appointment_view',
            [
                'sidenav' => 'appointments',
                'appointment' => $appointment,
                'network_error' => false
            ]);
    }

    public function updateAppointment(Request $request)
    {

        if (!Auth::user()) {
            return view("login");
        }

        $client = new Client(['headers' => [ 'Content-Type' => 'application/json' ]]);
        $appointment = null;
        $server_url = env('SERVER_URL');

        $appointment_id = $request->get("appointment_id");
        $status = $request->get('status');
        $response = [];

        try{
            $res = $client->post($server_url . '/donation/update_status/' . $appointment_id,
                ['body' => json_encode(['status' => $status])]
            );

            $response = json_decode($res->getBody(),true);
            if($appointment['status'] == true)
            {
                $appointment = $appointment['request_info'];
            }
        }
        catch (\Exception $e)
        {
            $response['status'] = false;
            $response['message'] = "Something went wrong. Please try again";
        }
        return $response;
    }

}
