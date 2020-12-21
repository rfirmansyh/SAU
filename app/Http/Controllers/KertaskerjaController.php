<?php

namespace App\Http\Controllers;

use App\Kertaskerja;
use Illuminate\Http\Request;

class KertaskerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($unitkerja_id)
    {
        $unitkerja = \App\Unitkerja::find($unitkerja_id);
        $kesesuaians = \App\Kesesuaian::all();
        $keterlambatans = \App\Keterlambatan::all();
        $kode_temuans = \App\KodeTemuan::all();
        return view('unitkerja.kertaskerja')->with([
            'unitkerja' => $unitkerja,
            'kesesuaians' => $kesesuaians,
            'keterlambatans' => $keterlambatans,
            'kode_temuans' => $kode_temuans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $unitkerja_id)
    {
        $kertaskerja = new Kertaskerja;
        $kertaskerja->nama_kertaskerja = $request->nama_kertaskerja;
        $kertaskerja->no_buku = $request->no_buku;
        $kertaskerja->no_spj = $request->no_spj;
        $kertaskerja->tanggal_buku = \Carbon\Carbon::parse($request->tanggal_buku);
        $kertaskerja->tanggal_spj = \Carbon\Carbon::parse($request->tanggal_spj);
        $kertaskerja->keterangan = $request->keterangan;
        $kertaskerja->nilai_transaksi = $request->nilai_transaksi;
        $kertaskerja->pajak_audite = $request->pajak_audite;
        $kertaskerja->temuan_pajak = $request->temuan_pajak;
        $kertaskerja->ssp = $request->ssp;
        $kertaskerja->kesesuaian_ppn = $request->kesesuaian_ppn;
        $kertaskerja->kesesuaian_pph = $request->kesesuaian_pph;
        $kertaskerja->keterlambatan_penyetoran = $request->keterlambatan_penyetoran;
        $kertaskerja->kuitansi = $request->kuitansi;
        $kertaskerja->surat_sk = $request->surat_sk;
        $kertaskerja->kelengkapan_ttd = $request->kelengkapan_ttd;
        $kertaskerja->daftar_hadir_peserta = $request->daftar_hadir_peserta;
        $kertaskerja->kesesuaian_sbu = $request->kesesuaian_sbu;
        $kertaskerja->kesesuaian_mak = $request->kesesuaian_mak;
        $kertaskerja->kesesuaian_laporan_kegiatan = $request->kesesuaian_laporan_kegiatan;
        if (in_array(!null, $request->temuan)) {
            $temuans = [];
            foreach ($request->temuan as $i => $temuan) {
                if ($temuan !== null) {
                    $temuans[] = [
                        'kode' => \App\KodeTemuan::find(intval($temuan))->kode,
                        'detail' => \App\KodeTemuan::find(intval($temuan))->detail,
                    ];
                }
            }
            $kertaskerja->temuan = json_encode($temuans);
        } else {
            $kertaskerja->temuan = json_encode([]);
        }
        $kertaskerja->deskripsi = $request->deskripsi;
        $kertaskerja->ditulis_dtm = $request->ditulis_dtm;
        $kertaskerja->save();

        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', 'Data Kertas Kerja Berhasil Ditambahkan!'); 
        return redirect()->route('kertaskerja.index', $unitkerja_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kertaskerja  $kertaskerja
     * @return \Illuminate\Http\Response
     */
    public function show(Kertaskerja $kertaskerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kertaskerja  $kertaskerja
     * @return \Illuminate\Http\Response
     */
    public function edit(Kertaskerja $kertaskerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kertaskerja  $kertaskerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kertaskerja $kertaskerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kertaskerja  $kertaskerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kertaskerja $kertaskerja)
    {
        //
    }
}
