<?php

namespace App\Http\Controllers;

use App\Models\Stations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class stationsController extends Controller
{
    public function index()
    {
        return view('stations', [
            'stations' => Stations::all()
        ]);
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $stations = stations::where('name', 'like', "%" . $keyword . "%")->paginate(5);
        return view('dashboard', compact('stations'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
