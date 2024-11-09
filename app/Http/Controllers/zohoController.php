<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class zohoController extends Controller
{
    protected function getAcessToken()
    {
        // API Endpoint
        $url = 'https://accounts.zoho.com/oauth/v2/token';

        $client = new Client();

        $data = $client->post($url, [
            'form_params' => [
                'refresh_token' => env('zoho_refresh_token'),
                'client_id' => env('zoho_client_id'),
                'client_secret' => env('zoho_client_secret'),
                'grant_type' => 'refresh_token',

            ]
        ]);

        $response = json_decode($data->getBody());
        return $response;
    }

    public function contactsIndex()
    {

        $token = $this->getAcessToken()->access_token;
        $client = new Client();
        $response = $client->get('https://www.zohoapis.com/crm/v3/Contacts', [
            'headers' => [
                'Authorization' => 'Zoho-oauthtoken ' . $token,
                'Accept' => 'application/json',
            ],
            'query' => [
                'fields' => 'Last_Name,First_Name,Email'
            ]
        ]);

        $contacts = json_decode($response->getBody());
        dd($contacts);
    }


    public function contactStore()
    {
        $token = $this->getAcessToken()->access_token;
        $client = new Client();

        $data  = [
            'data' => [
                ['Last_Name' => 'BIg MAn Nelly']
            ]
        ];

        $data = json_encode($data);
        dd(json_decode($data));


        $request = $client->post('https://www.zohoapis.com/crm/v3/Contacts', [
            'headers' => [
                'Authorization' => 'Zoho-oauthtoken ' . $token,
                'Accept' => 'application/json',
            ],
            'json' => $data
        ]);

        ♦

        $response = json_decode($request->getBody());
        dd($response);
    }

    public function fileHandler(Request $request)
    {
        if ($request->has("filer")) {
            $file = $request->filer;

            if ($file->getClientOriginalExtension() == 'csv') {
                $fullfile = fopen($file, 'r');

                $header = fgetcsv($fullfile);
                $lastname = array_search('Last_name', $header);
                $email = array_search('Email', $header);

                while (($row = fgetcsv($fullfile)) !== false) {
                    $data['data'][] =

                        [
                            'Last_Name' => $row[$lastname]
                        ];
                }



                $token = $this->getAcessToken()->access_token;
                $client = new Client();

                $request = $client->post('https://www.zohoapis.com/crm/v3/Contacts', [
                    'headers' => [
                        'Authorization' => 'Zoho-oauthtoken ' . $token,
                        'Accept' => 'application/json',
                    ],
                    'json' => $data
                ]);

                $response = json_decode($request->getBody());
                dd($response);
            }
        }
    }

    public function leadsIndex()
    {
        $token = $this->getAcessToken()->access_token;

        $client = new Client();
        $start = Carbon::now()->startOfDay()->toIso8601String();
        $end = Carbon::now()->endOfDay()->toIso8601String();
        $filter = "Created_Time:between:$start,$end";



        $request = $client->get('https://www.zohoapis.com/crm/v3/Leads/search', [
            'headers' => [
                'Authorization' => 'Zoho-oauthtoken ' . $token,
                'Accept' => 'application/json',
            ],
            'query' => [
                'criteria' => $filter,
            ]
        ]);

        $response = json_decode($request->getBody()->getContents());
        dd($response);
    }

    public function leadStore()
    {
        $token = $this->getAcessToken()->access_token;
        $client = new Client();

        $payload = [
            'data' => [
                [
                    'Last_Name' => ' Agboifoh',
                    'First_Name' => 'Ehireme',
                    'Company' => 'DiamondEx'
                ]
            ]
        ];

        $request = $client->post('https://www.zohoapis.com/crm/v4/Leads', [
            'headers' => [
                'Authorization' => 'Zoho-oauthtoken ' . $token,
                'Accept' => 'application/json'
            ],
            'json' => $payload
        ]);


        $response = json_decode($request->getBody());
        dd($response);
    }
}
