<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class devicesController extends Controller
{
    public function index()
    {
        return view('web-monitoring', [
            'title' => 'Dashboard Monitoring',
            'devices' => Devices::latest()->get(),
            'dev' => Devices::latest()->get()
        ]);
    }
    public function show(Devices $devices)
    {
        return view('devices', [
            'devices' => $devices
        ]);
    }
    public function home()
    {
        return view('home', [
            'devices' => Devices::latest()->get(),
            'dev' => Devices::simplePaginate(10),
        ]);
    }
    // public function cari(Request $request)
    // {
    //     $keyword = $request->keyword;
    //     $datas = Devices::where('device_id', 'LIKE', '%'.$keyword.'%')
    //     ->get();
    //     return view('dashboard', compact(
    //         'datas'
    //     ));
    // }
}
