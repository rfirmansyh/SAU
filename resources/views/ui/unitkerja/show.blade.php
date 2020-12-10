@extends('ui._layouts.app')

@section('title', 'Dashboard')

@section('header', 'Detail Unit Kerja')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Detail Unit Kerja</a></div>
    <div class="breadcrumb-item">Fakultas Ilmu Komputer</div>
@endsection
@section('content-header')
  <div class="row gutters-xs align-items-lg-center justify-content-between my-4">
    <div class="col-md-6 col-lg-3 col-xl-2">
      <div class="card card-body p-2 mb-0">
        <img src="{{ asset('img/unitkerja/fasilkom.png') }}" alt="" class="img-fluid">
      </div>
    </div>
    <div class="col-md pl-3 mb-3 mb-md-0">
        <h5 class="my-0">Fakultas Ilmu Komputer</h5>
        <span>Detail Unit Kerja Fakultas Ilmu Komputer</span>
    </div>
    <div class="col-lg-auto">
        <a href="#m-add-kertaskerja" data-toggle="modal" class="btn btn-block btn-lg btn-primary"><i class="fas fa-plus mr-2"></i> Tambah Data</a>
    </div>
  </div>
@endsection


@section('content')
 

  
    {{-- Export --}}
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md">Export Data</div>
                <div class="col-md-auto" id="col-export-table"></div>
            </div>
        </div>
    </div>

    {{-- Datatable --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-datatable" width="100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama Kertas Kerja</th>
                            <th>No. Buku</th>
                            <th>No. SPJ</th>
                            <th>Tanggal Buku</th>
                            <th>Tanggal SPJ</th>
                            <th>Keterangan</th> 
                            <th>Nilai Transaksi</th> 
                            <th>Pajak Audit</th>
                            <th>Temuan Pajak</th>
                            <th>SSP</th>
                            <th>Kesesuaian PPN</th>
                            <th>Kesesuaian PPh</th>
                            <th>Keterlambatan Penyetoran Pajak</th>
                            <th>Kuitansi</th>
                            <th>Surat Tugas / SK</th>
                            <th>Kelengkapan ttd/materai/stempel/admin</th>
                            <th>Daftar Hadir Peserta</th>
                            <th>Kesesuaian dg SBU / PMK</th>
                            <th>Kesesuaian MAK</th>
                            <th>Kesesuaian dengan Laporan Kegiatan</th>
                            <th>Temuan 1</th>
                            <th>Temuan 2</th>
                            <th>Temuan 3</th>
                            <th>Deskripsi Temuan dan Potensi TGR</th>
                            <th>Ditulis di DTM</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @for ($i = 0; $i < 4; $i++)
                        <tr>
                          <td>{{ $i+1 }}</td>
                          <td>Audit FASILKOM</td>
                          <td>{{ rand(1,100) }}</td>
                          <td>{{ rand(1,100) }}</td>
                          <td>3 Jan 2020</td>
                          <td>2 Jan 2020</td>
                          <td>Pelatihan Keuangan Perusahaan</td>
                          <td>{{ rand(1000000,10000000) }}</td>
                          <td></td>
                          <td></td>
                          <td><span class="badge badge-success">Ada</span></td>
                          <td>Nihil (sesuai)</td>
                          <td>Nihil (sesuai)</td>
                          <td>Tepat Waktu</td>
                          <td><span class="badge badge-success">Ada</span></td>
                          <td>Tidak Ada</td>
                          <td><span class="badge badge-success">Lengkap</span></td>
                          <td><span class="badge badge-success">Ada</span></td>
                          <td><span class="badge badge-success">Sesuai</span></td>
                          <td><span class="badge badge-success">Sesuai</span></td>
                          <td><span class="badge badge-success">Sesuai</span></td>
                          <td>Kekurangan Volume Pekerjaan dan/atau Barang</td>
                          <td>Pembayaran HR dan/atau biaya perjalanan dinas ganda</td>
                          <td>Belanja tidak sesuai atau melebihi ketentuan</td>
                          <td>Dokumen Lengkap</td>
                          <td><span class="badge badge-success">Sesuai</span></td>
                          <td>
                          <a href="#m-edit-kertaskerja" data-toggle="modal" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                          </td>
                        </tr>    
                      @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

{{-- modal --}}
@section('modal')
  {{-- Modal add : #m-add --}}
  <div class="modal fade" tabindex="-1" id="m-add-kertaskerja" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="regForm" action="">

        <h1>Kertas Kerja</h1>

        <!-- One "tab" for each step in the form: -->
        <div class="tab">
        {{-- input text/default --}}
            <div class="form-group">
                <label for="">Nama Kertas Kerja :</label>
                <input type="text" class="form-control">
            </div>

            {{-- input number --}}
            <div class="form-group">
                <label for="">No. Buku :</label>
                <input type="number" class="form-control">
            </div>

            <div class="form-group">
                <label for="">No. SPJ :</label>
                <input type="number" class="form-control">
            </div>
            
            {{-- input date --}}
            <div class="form-group">
                <label for="">Tanggal Buku :</label>
                <input type="date" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Tanggal SPJ :</label>
                <input type="date" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Keterangan :</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" required></textarea>
            </div>
        </div>

        <div class="tab">        
        <div class="form-group">
                <label for="">Nilai Transaksi :</label>
                <input type="number" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Pajak Audit :</label>
                <input type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Temuan Pajak :</label>
                <input type="text" class="form-control">
            </div>

            {{-- input radio --}}
            <div class="form-group">
                <label for="" class="d-block">SSP :</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Ada</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Tidak Ada</label>
                </div>
            </div>

            {{-- select --}}
            <div class="form-group">
                <label for="" class="d-block">Kesesuaian PPN :</label>
                <select name="" id="" class="form-control">
                    <option value="1">Nihil (sesuai)</option>
                    <option value="1">Kurang Bayar</option>
                    <option value="1">Lebih Bayar</option>
                </select>
            </div>

            <div class="form-group">
                <label for="" class="d-block">Kesesuaian PPh :</label>
                <select name="" id="" class="form-control">
                    <option value="1">Nihil (sesuai)</option>
                    <option value="1">Kurang Bayar</option>
                    <option value="1">Lebih Bayar</option>
                </select>
            </div>
        </div>

        <div class="tab">
        <div class="form-group">
                <label for="" class="d-block">Keterlambatan Penyetoran Pajak :</label>
                <select name="" id="" class="form-control">
                    <option value="1">Tepat Waktu</option>
                    <option value="1">PPN</option>
                    <option value="1">PPh</option>
                    <option value="1">PPN &PPh</option>
                </select>
            </div>

        
            <div class="form-group">
                <label for="" class="d-block">Kuitansi :</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio2" name="customRadio1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">Ada</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio2" name="customRadio1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">Tidak Ada</label>
                </div>
            </div>

            <div class="form-group">
            <label for="" class="d-block">Surat Tugas / SK :</label>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadio3" name="customRadio2" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio3">Ada</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio3" name="customRadio2" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio3">Tidak Ada</label>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="d-block">Kelengkapan ttd/materai/stempel/admin :</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio4" name="customRadio3" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio4">Lengkap</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio4" name="customRadio3" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio4">Kurang Lengkap</label>
                    </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio4" name="customRadio3" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio4">Tidak Lengkap</label>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="d-block">Daftar Hadir Peserta :</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadio5" name="customRadio4" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio5">Ada</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadio5" name="customRadio4" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio5">Tidak Ada</label>
                    </div>
                </div>

        <div class="form-group">
            <label for="" class="d-block">Kesesuaian dg SBU / PMK :</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio6" name="customRadio5" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio6">Sesuai</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio6" name="customRadio5" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio6">Tidak Sesuai</label>
                </div>
            </div>

        <div class="form-group">
            <label for="" class="d-block">Kesesuaian MAK :</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio7" name="customRadio6" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio7">Sesuai</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio7" name="customRadio6" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio7">Tidak Sesuai</label>
                </div>
        </div>

        <div class="form-group">
            <label for="" class="d-block">Kesesuaian dengan Laporan Kegiatan :</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio9" name="customRadio8" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio9">Sesuai</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio9" name="customRadio8" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio9">Tidak Sesuai</label>
                </div>
        </div>
    </div>

        <div class="tab">
        <div class="form-group">
        <label for="" class="d-block">Temuan 1 :</label>
            <select name="" id="" class="form-control">
                <option value="1">Kekurangan Volume Pekerjaan dan/atau Barang</option>
                <option value="1">Pembayaran HR dan/atau biaya perjalanan dinas ganda</option>
                <option value="1">Belanja tidak sesuai atau melebihi ketentuan</option>
                <option value="1">Kelebihan penetapan dan pembayaran restitusi pajak atau kompensasi kerugian</option>
                <option value="1">Entitas belum/tidak melaksanakan tuntutan pembendaharaan</option>
                <option value="1">Pengenaan tarif pajak /PNBP lebih rendah dari ketentuan</option>
                <option value="1">Pertanggungjawaban tidak akuntanble atau bukti tidak lengkap atau valid</option>
                <option value="1">Penyimpangan terhadap peraturan perundang-undangan bidang tertentu</option>
                <option value="1">Pengalihan anggaran antar MAK tidak sah</option>
                <option value="1">Pencatatan tidak/belum dilakukan/tidak akurat</option>
                <option value="1">Pemborosan keuangan negara/daerah/perusahaan/ kemahalan</option>
                <option value="1">Penggunaan anggaran tidak tepat sasaran/tidak sesuai peruntukan</option>
                <option value="1">Pemahalan harga (mark up)</option>
                <option value="1">'Penyetoran penerimaan negara/daerah atau kas di bendaharawan ke kas negara/daerah melebihi batas waktu yang ditentukan</option>
            </select>
            </div>

            <div class="form-group">
            <label for="" class="d-block">Temuan 2 :</label>
            <select name="" id="" class="form-control">
                <option value="1">Kekurangan Volume Pekerjaan dan/atau Barang</option>
                <option value="1">Pembayaran HR dan/atau biaya perjalanan dinas ganda</option>
                <option value="1">Belanja tidak sesuai atau melebihi ketentuan</option>
                <option value="1">Kelebihan penetapan dan pembayaran restitusi pajak atau kompensasi kerugian</option>
                <option value="1">Entitas belum/tidak melaksanakan tuntutan pembendaharaan</option>
                <option value="1">Pengenaan tarif pajak /PNBP lebih rendah dari ketentuan</option>
                <option value="1">Pertanggungjawaban tidak akuntanble atau bukti tidak lengkap atau valid</option>
                <option value="1">Penyimpangan terhadap peraturan perundang-undangan bidang tertentu</option>
                <option value="1">Pengalihan anggaran antar MAK tidak sah</option>
                <option value="1">Pencatatan tidak/belum dilakukan/tidak akurat</option>
                <option value="1">Pemborosan keuangan negara/daerah/perusahaan/ kemahalan</option>
                <option value="1">Penggunaan anggaran tidak tepat sasaran/tidak sesuai peruntukan</option>
                <option value="1">Pemahalan harga (mark up)</option>
                <option value="1">'Penyetoran penerimaan negara/daerah atau kas di bendaharawan ke kas negara/daerah melebihi batas waktu yang ditentukan</option>
            </select>
            </div>

            <div class="form-group">
            <label for="" class="d-block">Temuan 3 :</label>
            <select name="" id="" class="form-control">
                <option value="1">Kekurangan Volume Pekerjaan dan/atau Barang</option>
                <option value="1">Pembayaran HR dan/atau biaya perjalanan dinas ganda</option>
                <option value="1">Belanja tidak sesuai atau melebihi ketentuan</option>
                <option value="1">Kelebihan penetapan dan pembayaran restitusi pajak atau kompensasi kerugian</option>
                <option value="1">Entitas belum/tidak melaksanakan tuntutan pembendaharaan</option>
                <option value="1">Pengenaan tarif pajak /PNBP lebih rendah dari ketentuan</option>
                <option value="1">Pertanggungjawaban tidak akuntanble atau bukti tidak lengkap atau valid</option>
                <option value="1">Penyimpangan terhadap peraturan perundang-undangan bidang tertentu</option>
                <option value="1">Pengalihan anggaran antar MAK tidak sah</option>
                <option value="1">Pencatatan tidak/belum dilakukan/tidak akurat</option>
                <option value="1">Pemborosan keuangan negara/daerah/perusahaan/ kemahalan</option>
                <option value="1">Penggunaan anggaran tidak tepat sasaran/tidak sesuai peruntukan</option>
                <option value="1">Pemahalan harga (mark up)</option>
                <option value="1">'Penyetoran penerimaan negara/daerah atau kas di bendaharawan ke kas negara/daerah melebihi batas waktu yang ditentukan</option>
            </select>
            </div>

            <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi Temuan dan Potensi TGR (tulis strip(-) jika tidak ada):</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" required></textarea>
            </div>

            <div class="form-group">
            <label for="">Ditulis di DTM :</label> <br>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadio10" name="customRadio9" class="custom-control-input">
                <label class="custom-control-label" for="customRadio10">Iya</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadio10" name="customRadio9" class="custom-control-input">
                <label class="custom-control-label" for="customRadio10">Tidak</label>
            </div>
            </div>
        </div>

        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        </div>
        </form>
        
        </div>
        <div class="modal-footer">
        <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Kembali</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  {{-- end of Modal add : #m-add --}}
  

{{-- Modal edit : #m-edit --}}
<div class="modal fade" tabindex="-1" id="m-edit-kertaskerja" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="regForm" action="">
        
        <h1>Kertas Kerja</h1>

        <!-- One "tab" for each step in the form: -->
        {{-- input text/default --}}
            <div class="form-group">
                <label for="">Nama Kertas Kerja :</label>
                <input type="text" class="form-control">
            </div>

            {{-- input number --}}
            <div class="form-group">
                <label for="">No. Buku :</label>
                <input type="number" class="form-control">
            </div>

            <div class="form-group">
                <label for="">No. SPJ :</label>
                <input type="number" class="form-control">
            </div>
            
            {{-- input date --}}
            <div class="form-group">
                <label for="">Tanggal Buku :</label>
                <input type="date" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Tanggal SPJ :</label>
                <input type="date" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Keterangan :</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" required></textarea>
            </div>

        <div class="form-group">
                <label for="">Nilai Transaksi :</label>
                <input type="number" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Pajak Audit :</label>
                <input type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Temuan Pajak :</label>
                <input type="text" class="form-control">
            </div>

            {{-- input radio --}}
            <div class="form-group">
                <label for="" class="d-block">SSP :</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Ada</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Tidak Ada</label>
                </div>
            </div>

            {{-- select --}}
            <div class="form-group">
                <label for="" class="d-block">Kesesuaian PPN :</label>
                <select name="" id="" class="form-control">
                    <option value="1">Nihil (sesuai)</option>
                    <option value="1">Kurang Bayar</option>
                    <option value="1">Lebih Bayar</option>
                </select>
            </div>

            <div class="form-group">
                <label for="" class="d-block">Kesesuaian PPh :</label>
                <select name="" id="" class="form-control">
                    <option value="1">Nihil (sesuai)</option>
                    <option value="1">Kurang Bayar</option>
                    <option value="1">Lebih Bayar</option>
                </select>
            </div>

        <div class="form-group">
                <label for="" class="d-block">Keterlambatan Penyetoran Pajak :</label>
                <select name="" id="" class="form-control">
                    <option value="1">Tepat Waktu</option>
                    <option value="1">PPN</option>
                    <option value="1">PPh</option>
                    <option value="1">PPN &PPh</option>
                </select>
            </div>

        
            <div class="form-group">
                <label for="" class="d-block">Kuitansi :</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio2" name="customRadio1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">Ada</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio2" name="customRadio1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">Tidak Ada</label>
                </div>
            </div>

            <div class="form-group">
            <label for="" class="d-block">Surat Tugas / SK :</label>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadio3" name="customRadio2" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio3">Ada</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio3" name="customRadio2" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio3">Tidak Ada</label>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="d-block">Kelengkapan ttd/materai/stempel/admin :</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio4" name="customRadio3" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio4">Lengkap</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio4" name="customRadio3" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio4">Kurang Lengkap</label>
                    </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio4" name="customRadio3" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio4">Tidak Lengkap</label>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="d-block">Daftar Hadir Peserta :</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadio5" name="customRadio4" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio5">Ada</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadio5" name="customRadio4" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio5">Tidak Ada</label>
                    </div>
                </div>

        <div class="form-group">
            <label for="" class="d-block">Kesesuaian dg SBU / PMK :</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio6" name="customRadio5" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio6">Sesuai</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio6" name="customRadio5" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio6">Tidak Sesuai</label>
                </div>
            </div>

        <div class="form-group">
            <label for="" class="d-block">Kesesuaian MAK :</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio7" name="customRadio6" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio7">Sesuai</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio7" name="customRadio6" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio7">Tidak Sesuai</label>
                </div>
        </div>

        <div class="form-group">
            <label for="" class="d-block">Kesesuaian dengan Laporan Kegiatan :</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio9" name="customRadio8" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio9">Sesuai</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio9" name="customRadio8" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio9">Tidak Sesuai</label>
                </div>
        </div>

        <div class="form-group">
        <label for="" class="d-block">Temuan 1 :</label>
            <select name="" id="" class="form-control">
                <option value="1">Kekurangan Volume Pekerjaan dan/atau Barang</option>
                <option value="1">Pembayaran HR dan/atau biaya perjalanan dinas ganda</option>
                <option value="1">Belanja tidak sesuai atau melebihi ketentuan</option>
                <option value="1">Kelebihan penetapan dan pembayaran restitusi pajak atau kompensasi kerugian</option>
                <option value="1">Entitas belum/tidak melaksanakan tuntutan pembendaharaan</option>
                <option value="1">Pengenaan tarif pajak /PNBP lebih rendah dari ketentuan</option>
                <option value="1">Pertanggungjawaban tidak akuntanble atau bukti tidak lengkap atau valid</option>
                <option value="1">Penyimpangan terhadap peraturan perundang-undangan bidang tertentu</option>
                <option value="1">Pengalihan anggaran antar MAK tidak sah</option>
                <option value="1">Pencatatan tidak/belum dilakukan/tidak akurat</option>
                <option value="1">Pemborosan keuangan negara/daerah/perusahaan/ kemahalan</option>
                <option value="1">Penggunaan anggaran tidak tepat sasaran/tidak sesuai peruntukan</option>
                <option value="1">Pemahalan harga (mark up)</option>
                <option value="1">'Penyetoran penerimaan negara/daerah atau kas di bendaharawan ke kas negara/daerah melebihi batas waktu yang ditentukan</option>
            </select>
            </div>

            <div class="form-group">
            <label for="" class="d-block">Temuan 2 :</label>
            <select name="" id="" class="form-control">
                <option value="1">Kekurangan Volume Pekerjaan dan/atau Barang</option>
                <option value="1">Pembayaran HR dan/atau biaya perjalanan dinas ganda</option>
                <option value="1">Belanja tidak sesuai atau melebihi ketentuan</option>
                <option value="1">Kelebihan penetapan dan pembayaran restitusi pajak atau kompensasi kerugian</option>
                <option value="1">Entitas belum/tidak melaksanakan tuntutan pembendaharaan</option>
                <option value="1">Pengenaan tarif pajak /PNBP lebih rendah dari ketentuan</option>
                <option value="1">Pertanggungjawaban tidak akuntanble atau bukti tidak lengkap atau valid</option>
                <option value="1">Penyimpangan terhadap peraturan perundang-undangan bidang tertentu</option>
                <option value="1">Pengalihan anggaran antar MAK tidak sah</option>
                <option value="1">Pencatatan tidak/belum dilakukan/tidak akurat</option>
                <option value="1">Pemborosan keuangan negara/daerah/perusahaan/ kemahalan</option>
                <option value="1">Penggunaan anggaran tidak tepat sasaran/tidak sesuai peruntukan</option>
                <option value="1">Pemahalan harga (mark up)</option>
                <option value="1">'Penyetoran penerimaan negara/daerah atau kas di bendaharawan ke kas negara/daerah melebihi batas waktu yang ditentukan</option>
            </select>
            </div>

            <div class="form-group">
            <label for="" class="d-block">Temuan 3 :</label>
            <select name="" id="" class="form-control">
                <option value="1">Kekurangan Volume Pekerjaan dan/atau Barang</option>
                <option value="1">Pembayaran HR dan/atau biaya perjalanan dinas ganda</option>
                <option value="1">Belanja tidak sesuai atau melebihi ketentuan</option>
                <option value="1">Kelebihan penetapan dan pembayaran restitusi pajak atau kompensasi kerugian</option>
                <option value="1">Entitas belum/tidak melaksanakan tuntutan pembendaharaan</option>
                <option value="1">Pengenaan tarif pajak /PNBP lebih rendah dari ketentuan</option>
                <option value="1">Pertanggungjawaban tidak akuntanble atau bukti tidak lengkap atau valid</option>
                <option value="1">Penyimpangan terhadap peraturan perundang-undangan bidang tertentu</option>
                <option value="1">Pengalihan anggaran antar MAK tidak sah</option>
                <option value="1">Pencatatan tidak/belum dilakukan/tidak akurat</option>
                <option value="1">Pemborosan keuangan negara/daerah/perusahaan/ kemahalan</option>
                <option value="1">Penggunaan anggaran tidak tepat sasaran/tidak sesuai peruntukan</option>
                <option value="1">Pemahalan harga (mark up)</option>
                <option value="1">'Penyetoran penerimaan negara/daerah atau kas di bendaharawan ke kas negara/daerah melebihi batas waktu yang ditentukan</option>
            </select>
            </div>

            <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi Temuan dan Potensi TGR (tulis strip(-) jika tidak ada):</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" required></textarea>
            </div>

            <div class="form-group">
            <label for="">Ditulis di DTM :</label> <br>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadio10" name="customRadio9" class="custom-control-input">
                <label class="custom-control-label" for="customRadio10">Iya</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadio10" name="customRadio9" class="custom-control-input">
                <label class="custom-control-label" for="customRadio10">Tidak</label>
            </div>
            </div>
            </form>
        </div>
        <div class="modal-footer">
        <div style="overflow:auto;">
        <div style="float:right;">
        <input type="submit" name="submit" class="btn btn-primary" value="Ubah">
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>

{{-- end of Modal edit : #m-edit --}}
@endsection
{{-- end of modal --}}

@section('style')
  <link rel="stylesheet" href="{{ asset('vendors/datatable/datatable.min.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/>
  <link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('vendors/bs-datetimepicker/bootstrap-datetimepicker.min.css') }}">
  <style>
      .dataTables_wrapper .dataTables_length .custom-select {
          padding-right: 45px !important;
      }
      .dataTables_wrapper .select-info {
          margin-left: 10px;
          color: rgb(255, 115, 0);
          font-weight: bold;
      }
      .dataTables_wrapper tr.selected {
          background-color: rgba(63, 63, 63, 0.09);
      }
      .dataTables_wrapper .dataTables_length .custom-select, .dataTables_wrapper .dataTables_filter .form-control {
          margin-left: 20px;
      }
      .dataTables_wrapper .dataTables_length label, .dataTables_wrapper .dataTables_filter label {
          display: flex;
          align-items: center;
      }
      @media screen and (max-width: 768px) {
          .dataTables_wrapper .dataTables_length .custom-select, .dataTables_wrapper .dataTables_filter .form-control {
              margin-left: 0;
          }
          .dataTables_wrapper .dataTables_length label, .dataTables_wrapper .dataTables_filter label {
              display: flex;
              flex-direction: column;
              align-items: stretch;
          }
      }

                
        * {
        box-sizing: border-box;
        }

        body {
        background-color: #f1f1f1;
        }

        #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        font-family: Raleway;
        padding: 40px;
        width: 70%;
        min-width: 300px;
        }

        h1 {
        text-align: center;  
        }

        input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
        background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
        display: none;
        }

        button {
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
        }

        button:hover {
        opacity: 0.8;
        }

        #prevBtn {
        background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;  
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
        }

        .step.active {
        opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
        background-color: #4CAF50;
        }
  </style>
@endsection

@section('script')
    <script src="{{ asset('vendors/datatable/datatable.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script src="{{ asset('vendors/datatable/datatable-bs.min.js') }}"></script>
    <script src="{{ asset('vendors/bs-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>

  <script>

    // INIT DATETIME PICKER
    $('[data-input="datetimepicker"]').datetimepicker({
        timeZone:'Asia/Jakarta',
        widgetPositioning: {
            horizontal: 'auto',
            vertical:'bottom'
        },
        minDate: moment()
    });

    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            'dom': `<'row no-gutters'<'col-md'l><'col-md-auto'f><'col-md-auto'B>>
                    <'row'<'col-12't>>
                    <'row no-gutters justify-content-center'<'col-md'i><'col-md-auto'p>>`,
            buttons: [
                {
                    extend: 'colvis',
                    text: '<i class="fas fa-table mr-2"></i>Pilih Kolom',
                    className: 'btn-primary',
                    prefixButtons: [ 
                        {
                            extend: 'colvisRestore',
                            text: 'Tampilkan Semua Kolom'
                        }
                    ]
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel mr-2"></i>Export Excel',
                    className: 'btn-success',
                    title: 'Test Data export',
                    exportOptions: {
                        columns: ":visible"
                    }
                }, 
            ],
            "pagingType": "numbers",
            "language": {
                "lengthMenu": "Tampilkan _MENU_",
                "zeroRecords": "Tidak Ada Data",
                "info": "Menampilkan _PAGE_ dari _PAGES_ page",
                "infoEmpty": "Tidak Ada Data",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Cari Data Mitra:"
            },
            // ajax: users_ajax_url,
            // preDrawCallback: () => {
            //     $('#datatable').loader(true);
            // },
            'columnDefs': [
                {
                    'targets': 0,
                    'checkboxes': {
                    'selectRow': true
                    }
                }
            ],
            'select': {
                'style': 'multi',
                'selector': 'td:not(:last-child)'
            },
            'order': [[1, 'asc']],
            // columns: [
            //     {data: 'id', name: 'id'},
            //     {data: 'photo', name: 'photo'},
            //     {data: 'email', name: 'email'},
            //     {data: 'name', name: 'name'},
            //     {data: 'budidaya', name: 'budidaya'},
            //     {data: 'joined_at', name: 'joined_at'},
            //     {data: 'status', name: 'status'},
            //     {data: 'action', name: 'action'},
            // ],
            // drawCallback: () => {
            //     $('#datatable').loader(false);
            // },
        });
        table.buttons().container().appendTo('#col-export-table');
        
    } );

            var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Selanjutnya";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
        }

        function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
        }

        function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
        }

        function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
        }

</script>
@endsection