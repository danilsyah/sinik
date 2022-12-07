<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemeriksaanDetail;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $results = DB::select( DB::raw("SELECT month(created_at) as bulan, count(id) as total_pemeriksaan from pemeriksaans where year(created_at) = year(now()) group by month(created_at)") );
        // change results array to object id by column month
        $results_months = array_column($results, 'total_pemeriksaan', 'bulan');
        // serialize 1 - 12 total array
        $months = array_fill(1, 12, 0);
        
        // merge array
        $months_report = array_replace($months, $results_months);
        $str_month = implode(",",$months_report);
        // dd($str_month);
        
        // dd($results);
        return view('home', ['str_month' => $str_month]);
    }
}
