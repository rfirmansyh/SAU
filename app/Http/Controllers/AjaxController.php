<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AjaxController extends Controller
{
    public function getUnitkerjaById(Request $request, $id) {
        $unitkerja = \App\Unitkerja::find($id);
        return api_response(1, 'Untikerja By Id Success', $unitkerja);
    }

    public function getKertaskerjaById(Request $request, $id) {
        $kertaskerja = \App\Kertaskerja::select(\DB::raw('kertaskerjas.*, unitkerjas.name as nama_unitkerja'))
                        ->join('unitkerjas', 'unitkerjas.id', '=', 'kertaskerjas.unitkerja_id')
                        ->where('kertaskerjas.id', $id)
                        ->first();
        return api_response(1, 'Kertas Kerja By Id Success', $kertaskerja);
    }

    public function getKertasKerjas(Request $request) {
        $kertaskerjas = \App\Kertaskerja::all();
        return DataTables::of($kertaskerjas)
            ->addColumn('id', function($kertaskerja) {
                return $kertaskerja->id;
            })
            ->addColumn('no_buku', function($kertaskerja) {
                return $kertaskerja->no_buku;
            })
            ->addColumn('no_spj', function($kertaskerja) {
                return $kertaskerja->no_spj;
            })
            ->addColumn('keterangan', function($kertaskerja) {
                return substr($kertaskerja->keterangan, 0, 30).( ($kertaskerja->keterangan > 30) ? '...' : ''  );
            })
            ->addColumn('dibuat', function($kertaskerja) {
                return $kertaskerja->created_at;
            })
            ->addColumn('dtm', function($kertaskerja) {
                return $kertaskerja->ditulis_dtm;
            })
            ->addColumn('action', function($kertaskerja) {
                return '<a href="#" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                        <button data-detail-id="'.$kertaskerja->id.'" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>';
            })
            ->rawColumns(['action'])->make(true);
    }
}
