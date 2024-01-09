<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class github extends Controller
{
    function index() {

        $token = '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'; // Replace with your GitHub personal access token
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);
        $response = $client->get('https://api.github.com/AdvenAdam/repos');
        dd($response);
        $repositories = json_decode($response->getBody());
        dd($repositories);
        return view('github.index', compact('repositories'));
    }
    }
