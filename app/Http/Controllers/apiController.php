<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class apiController extends Controller
{
    public function index()
    {
        $data['listing'] = Listing::all();
        // dd($data);
        return response()->json($data);
    }
}
