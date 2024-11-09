<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class apiController extends Controller
{
    public function index()
    {
        $data['listing'] = Listing::all();
        // dd($data);
        return response()->json($data);
    }

    public function gettoken()
    {
    }
    public function getRefreshToken()
    {
        $code = Request()->code;
        $client = new Client();

        $data = $client->post('https://accounts.zoho.com/oauth/v2/token', [
            'form_params' => [
                'grant_type' => "authorization_code",
                'client_id' => env('zoho_client_id'),
                'client_secret' => env('zoho_client_secret'),
                'redirect_uri' => env('zoho_redirect'),
                'code' => $code
            ]
        ]);

        $response = json_decode($data->getBody());
        $refresh_token = $response->refresh_token;
        echo $refresh_token;
        dd($response);
        return $refresh_token;
    }
}
