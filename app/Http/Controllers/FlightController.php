<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as ApiRequest;


class FlightController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 1|s0njhKrVPE8xSpD4S08jgYLxrVIJTpjZgv7lRAMc77aec1e7'
        ];
        $body = '{
            "from": "'.$request->from_where.'",
            "to": "'.$request->to_where.'",
            "departure": "'.date('Y-m-d', strtotime(str_replace('/', '-', $request->start))).'",
            "adult": "'.((isset($request->seat_type['adult']))?$request->seat_type['adult']:1).'",
            "trip_type": "'.$request->tri_type.'"
        }';

        $request = new ApiRequest('POST', env('SEVENTH_AVIATION_API_URL')."/api/flight/search", $headers, $body);
        $res = $client->sendAsync($request)->wait();
        $results = collect(json_decode($res->getBody()->getContents(), true));

        if (isset($results['data']))
        {
            return response()->json($results['data'], 200);
        }

        return response()->json([], 400);
    }
}
