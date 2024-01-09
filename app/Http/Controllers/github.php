<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class github extends Controller
{
    function index() {

        $token = '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'; 
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);
        $response = $client->get('https://api.github.com/users/AdvenAdam/repos');
        $repositories = json_decode($response->getBody());
        $returnArray = [];
        foreach ($repositories as $repo) {
            $data = [
                'name' => $repo->name,
                'created_at' => $repo->created_at,
                'url' => $repo->html_url
            ];
            array_push($returnArray, $data);
        }
        return json_encode($returnArray);
    }
}