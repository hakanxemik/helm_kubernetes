<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GuestController extends Controller
{
    public function index()
    {
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->request('GET', $_ENV['BACKEND_URL'], [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('products.index')
            ->with('entries', $responseBody->entries);
    }

    public function post() {
        return view('products.post');
    }

    public function save(Request $request) {
        $response = Http::post($_ENV['BACKEND_URL'], [
            'visitor' => $request->visitor,
            'title' => $request->title,
            'text' => $request->text,
            'created' => Carbon::now()
        ]);

        return redirect()->action('App\Http\Controllers\GuestController@index');
    }
}
