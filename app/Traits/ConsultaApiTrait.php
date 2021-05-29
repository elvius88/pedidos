<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait ConsultaApiTrait
{
    protected function obtener_access_token(){
        $response = Http::asForm()->post(env('API_TOKEN'), [
            'grant_type'  => 'password',
            'username' => env('API_USERNAME'),
            'password'  => env('API_PASSWORD'),
            'client_id' => env('API_CLIENT_ID'),
            'client_secret'  => env('API_CLIENT_SECRET'),
            'scope' => '',
        ]);

        return $response->json();
    }
}