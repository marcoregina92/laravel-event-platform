<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
    public function index() {
        $results = Event::with("tags")->get();
        $data = [
            "success" => true,
            "payload" => $results
        ];
        return response()->json($data);
    }
}
