<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GuestController extends Controller
{
    public function getEntries() {
        $guests = Guest::all();

        return new Response($guests, 200);
    }

    public function store(Request $request) {
        $request->validate([
            'visitor' => 'required|string',
            'title' => 'required|string',
            'text' => 'string'
        ]);

        Guest::create([
            'visitor' => $request->visitor,
            'title' => $request->title,
            'text' => $request->text
        ]);

        return new Response('Entry created', 200);
    }
}
