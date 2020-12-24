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
    public function index(Request $request, $unitkerja_id = null)
    {
        $unitkerjas = \App\Unitkerja::all();
        $unitkerja = \App\Unitkerja::first();
        if ($unitkerja_id !== null) {
            $unitkerja = \App\Unitkerja::find(intval($unitkerja_id));
        }
        if ($request->select_unitkerja_id) {
            $unitkerja = \App\Unitkerja::find(intval($request->select_unitkerja_id));
        }
        
        $kesesuaians = \App\Kesesuaian::all();
        $keterlambatans = \App\Keterlambatan::all();
        $kode_temuans = \App\KodeTemuan::all();
        return view('unitkerja.kertaskerja')->with([
            'unitkerjas' => $unitkerjas,
            'unitkerja' => $unitkerja,
            'kesesuaians' => $kesesuaians,
            'keterlambatans' => $keterlambatans,
            'kode_temuans' => $kode_temuans
        ]);
    }

    public function dtm(Request $request)
    {
        $unitkerjas = \App\Unitkerja::all();

        $unitkerja = \App\Unitkerja::first();
        if ($request->select_unitkerja_id) {
            $unitkerja = \App\Unitkerja::find(intval($request->select_unitkerja_id));
        }

        $kesesuaians = \App\Kesesuaian::all();
        $keterlambatans = \App\Keterlambatan::all();
        $kode_temuans = \App\KodeTemuan::all();
        return view('unitkerja.dtm')->with([
            'unitkerjas' => $unitkerjas,
            'unitkerja' => $unitkerja,
            'kesesuaians' => $kesesuaians,
            'keterlambatans' => $keterlambatans,
            'kode_temuans' => $kode_temuans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $unitkerja_id)
    {
        $validator = \Validator::make($request->all(), [
            'nama_kertaskerja'                  => 'required',
            'no_buku'                           => 'required',
            'no_spj'                            => 'required',
            'tanggal_buku'                      => 'required',    
            'tanggal_spj'                       => 'required',    
            'nilai_transaksi'                   => 'required',        
            'ssp'                               => 'required',
            'kesesuaian_ppn'                    => 'required',        
            'kesesuaian_pph'                    => 'required',        
            'keterlambatan_penyetoran'          => 'required',                
            'kuitansi'                          => 'required',
            'surat_sk'                          => 'required',
            'kelengkapan_ttd'                   => 'required',        
            'daftar_hadir_peserta'              => 'required',            
            'kesesuaian_sbu'                    => 'required',        
            'kesesuaian_mak'                    => 'required',        
            'kesesuaian_laporan_kegiatan'       => 'required',                   
            'ditulis_dtm'                       => 'required',                   
        ]);

        if ($validator->fails()) {
            $validator->getMessageBag()->add('type', 'store');

            return redirect()->route('kertaskerja.index', $unitkerja_id)
                        ->withErrors($validator)
                        ->withInput();
        }
        
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
                        'id' => \App\KodeTemuan::find(intval($temuan))->id,
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
        $kertaskerja->unitkerja_id = $unitkerja_id;
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
    public function update(Request $request, $id)
    {
        $kertaskerja = Kertaskerja::find($id);

        $messages = [
            'required' => 'Harus Diisi'
        ];

        $validator = \Validator::make($request->all(), [
            'no_buku'                           => 'required',    
            'no_spj'                            => 'required',   
            'tanggal_buku'                      => 'required',         
            'tanggal_spj'                       => 'required',        
            'nilai_transaksi'                   => 'required',            
            'ssp'                               => 'required',
            'kesesuaian_ppn'                    => 'required',           
            'kesesuaian_pph'                    => 'required',           
            'keterlambatan_penyetoran'          => 'required',                     
            'kuitansi'                          => 'required',     
            'surat_sk'                          => 'required',     
            'kelengkapan_ttd'                   => 'required',            
            'daftar_hadir_peserta'              => 'required',                 
            'kesesuaian_sbu'                    => 'required',           
            'kesesuaian_mak'                    => 'required',           
            'kesesuaian_laporan_kegiatan'       => 'required',  
            'ditulis_dtm'                       => 'required',                          
        ], $messages);

        if ($validator->fails()) {
            $validator->getMessageBag()->add('type', 'update');
            $validator->getMessageBag()->add('editId', $id);

            return redirect()->route('kertaskerja.index', $kertaskerja->unitkerja_id)
                        ->withErrors($validator)
                        ->withInput();
        }

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
                        'id' => \App\KodeTemuan::find(intval($temuan))->id,
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
        \Session::flash('alert-message', 'Data Kertas Kerja Berhasil Diubah!'); 
        return redirect()->route('kertaskerja.index', $kertaskerja->unitkerja_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kertaskerja  $kertaskerja
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $unitkerja_id)
    {
        $validator = \Validator::make($request->all(), [
            'id'        => ['required', 'array', 'min:1']
        ]);

        if ($validator->fails()) {
            \Session::flash('alert-type', 'danger'); 
            \Session::flash('alert-message', 'Tidak Bisa Hapus, tidak ada baris yang dipilih!'); 

            return redirect()->route('kertaskerja.index', $unitkerja_id);
        }
        $ids = $request->id;
        $query = "id = $ids[0]";
        if (count($ids) > 1) {
            for ($i=1; $i < count($ids); $i++) { 
                $query .= " or id = $ids[$i]";
            }
        }
        
        $result = \DB::table('kertaskerjas')->whereRaw($query)->delete();
        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', 'Data Kertas Kerja Berhasil Dihapus!'); 
        return redirect()->route('kertaskerja.index', $unitkerja_id);
    }
}
