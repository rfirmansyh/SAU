<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auditor_total = \App\User::count();
        $unitkerja_total = \App\Unitkerja::count();
        $kertaskerja_total = \App\Kertaskerja::count();
        $dtm_total = \App\Kertaskerja::where('ditulis_dtm', '1')->count();

        $kertaskerja_monthly = \App\Kertaskerja::select(\DB::raw('COUNT(id) as total, CONCAT(MONTHNAME(created_at), " ", YEAR(created_at)) as month_year'))
                                ->groupBy('month_year')
                                ->get();
        // dd($kertaskerja_monthly);
        return view('index')->with([
            'auditor_total' => $auditor_total,
            'unitkerja_total' => $unitkerja_total,
            'kertaskerja_total' => $kertaskerja_total,
            'dtm_total' => $dtm_total,
            'kertaskerja_monthly' => $kertaskerja_monthly
        ]);
    }
}
