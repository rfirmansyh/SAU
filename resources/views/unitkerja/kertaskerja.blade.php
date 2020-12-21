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
                            <th>ID</th>
                            <th>No. Buku</th>
                            <th>No. SPJ</th>
                            <th>Keterangan</th>
                            <th>Dibuat Pada</th>
                            <th>Ditulis DTM</th>
                            <th>Aksi</th> 
                        </tr>
                    </thead>
                    <tbody>
                      {{-- @for ($i = 0; $i < 4; $i++)
                        <tr>
                            <td></td>
                            <td>1</td>
                            <td>33</td>
                            <td>{{ rand(1,100) }}</td>
                            <td>Pelatihan Keuangan Perusahaan</td>
                            <td>3 Jan 2020</td>
                            <td>
                                <span class="badge badge-success"><i class="fas fa-check"></i></span>
                            </td>
                            <td>
                            <a href="#m-detail-kertaskerja" data-toggle="modal" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>    
                      @endfor --}}
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
                    <h5>Tambah Kertas Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="store" action="{{ route('kertaskerja.store', $unitkerja->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    {{-- step 1 --}}
                    <div class="tab">
                        {{-- input text/default --}}
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Nama Kertas Kerja :</label>
                                    <input 
                                        value="{{ 'Kertas Kerja '.$unitkerja->name }}"
                                        type="text" name="nama_kertaskerja" class="form-control">
                                    <div class="invalid-feedback">
                                        Harus Diisi
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg">
                                {{-- input number --}}
                                <div class="form-group">
                                    <label for="">No. Buku :</label>
                                    <input
                                        value="{{ old('no_buku') }}"
                                        name="no_buku"
                                        type="number" class="form-control">
                                </div>
                                <div class="invalid-feedback">
                                    Harus Diisi
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg">
                                {{-- input date --}}
                                <div class="form-group">
                                    <label for="">Tanggal Buku :</label>
                                    <input 
                                        value="{{ old('tanggal_buku') }}"
                                        name="tanggal_buku"
                                        data-input="datetimepicker" class="form-control">
                                </div>
                                <div class="invalid-feedback">
                                    Harus Diisi
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Tanggal SPJ :</label>
                                    <input 
                                        value="{{ old('tanggal_spj') }}"
                                        name="tanggal_spj"
                                        data-input="datetimepicker" class="form-control">
                                </div>
                                <div class="invalid-feedback">
                                    Harus Diisi
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">No. SPJ :</label>
                                    <input
                                        value="{{ old('no_spj') }}"
                                        name="no_spj"
                                        type="number" class="form-control">
                                </div>
                                <div class="invalid-feedback">
                                    Harus Diisi
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label>Keterangan :</label>
                                    <textarea name="keterangan" class="form-control" rows="2" required>{{ old('keterangan') }}</textarea>
                                </div>
                            </div> 
                        </div>
                    </div>

                    {{-- step 2 --}}
                    <div class="tab">        
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Nilai Transaksi :</label>
                                    <input 
                                        value="{{ old('nilai_transaksi') }}"
                                        name="nilai_transaksi"
                                        type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Pajak Audite :</label>
                                    <input 
                                        value="{{ old('pajak_audite') }}"
                                        name="pajak_audite"
                                        type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="" class="d-block">Kesesuaian PPN :</label>
                                    <select name="kesesuaian_ppn" id="kesesuaian_ppn" class="selectpicker" title="Pilih Kesesuaian" data-style="form-control" data-width="100%">
                                        @foreach ($kesesuaians as $kesesuaian)
                                            <option {{ old('kesesuaian_ppn') === $kesesuaian->id ? 'selected' : '' }} value="{{ $kesesuaian->id }}">{{ $kesesuaian->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="" class="d-block">Kesesuaian PPh :</label>
                                    <select name="kesesuaian_pph" id="kesesuaian_pph" class="selectpicker" title="Pilih Kesesuaian" data-style="form-control" data-width="100%">
                                        @foreach ($kesesuaians as $kesesuaian)
                                            <option {{ old('kesesuaian_pph') === $kesesuaian->id ? 'selected' : '' }} value="{{ $kesesuaian->id }}">{{ $kesesuaian->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Temuan Pajak :</label>
                                    <input name="temuan_pajak" type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="" class="d-block">SSP :</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('ssp') === '1' ? 'checked' : ''  }}
                                            name="ssp" 
                                            id="ssp-1" 
                                            value="1"
                                            type="radio" class="custom-control-input">
                                        <label class="custom-control-label" for="ssp-1">Ada</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('ssp') !== '1' ? 'checked' : ''  }}
                                            name="ssp" 
                                            id="ssp-2" 
                                            value="0"
                                            type="radio" class="custom-control-input">
                                        <label class="custom-control-label" for="ssp-2">Tidak Ada</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>

                    {{-- step 3 --}}
                    <div class="tab">
                        <div class="row align-items-center mb-3">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="" class="d-block">Keterlambatan Penyetoran Pajak :</label>
                                    <select name="keterlambatan_penyetoran" id="" class="selectpicker" title="Pilih Jenis Keterlambatan" data-style="form-control" data-width="100%">
                                        @foreach ($keterlambatans as $keterlambatan)
                                            <option {{ old('keterlambatan_penyetoran') === $keterlambatan->id ? 'selected' : '' }} value="{{ $keterlambatan->id }}">{{ $keterlambatan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="" class="d-block">Kelengkapan ttd/materai/stempel/admin :</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('kelengkapan_ttd') === '1' ? 'checked' : '' }}
                                            value="1"
                                            type="radio" 
                                            id="kelengkapan_ttd-1" 
                                            name="kelengkapan_ttd" class="custom-control-input">
                                        <label class="custom-control-label" for="kelengkapan_ttd-1">Lengkap</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('kelengkapan_ttd') === '2' ? 'checked' : '' }}
                                            value="2"
                                            type="radio" 
                                            id="kelengkapan_ttd-2" 
                                            name="kelengkapan_ttd" class="custom-control-input">
                                        <label class="custom-control-label" for="kelengkapan_ttd-2">Kurang Lengkap</label>
                                        </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('kelengkapan_ttd') === '3' ? 'checked' : '' }}
                                            value="3"
                                            type="radio" 
                                            id="kelengkapan_ttd-3" 
                                            name="kelengkapan_ttd" class="custom-control-input">
                                        <label class="custom-control-label" for="kelengkapan_ttd-3">Tidak Lengkap</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group mb-1 d-flex align-items-center">
                                    <label for="" class="mr-3 mb-0">Opsi Semua</label>
                                    <div class="custom-control custom-radio custom-control-inline mr-0">
                                        <input type="radio" id="option-kuitansi-1" name="option-kuitansi" class="custom-control-input is-valid">
                                        <label class="custom-control-label" for="option-kuitansi-1"></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="option-kuitansi-2" name="option-kuitansi" class="custom-control-input is-invalid">
                                        <label class="custom-control-label" for="option-kuitansi-2"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="d-block">Kuitansi :</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('kuitansi') === '1' ? 'checked' : '' }}
                                            value="1"
                                            type="radio" 
                                            id="kuitansi-1" 
                                            name="kuitansi" class="custom-control-input">
                                        <label class="custom-control-label" for="kuitansi-1">Ada</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('kuitansi') === '0' ? 'checked' : '' }}
                                            value="0"
                                            type="radio" 
                                            id="kuitansi-2" 
                                            name="kuitansi" class="custom-control-input">
                                        <label class="custom-control-label" for="kuitansi-2">Tidak Ada</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="d-block">Surat Tugas / SK :</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('surat_sk') === '1' ? 'checked' : '' }}
                                            value="1"
                                            type="radio" 
                                            id="surat_sk-1" 
                                            name="surat_sk" class="custom-control-input">
                                        <label class="custom-control-label" for="surat_sk-1">Ada</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('surat_sk') === '0' ? 'checked' : '' }}
                                            value="0"
                                            type="radio" 
                                            id="surat_sk-2" 
                                            name="surat_sk" class="custom-control-input">
                                        <label class="custom-control-label" for="surat_sk-2">Tidak Ada</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="d-block">Daftar Hadir Peserta :</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('daftar_hadir_peserta') === '1' ? 'checked' : '' }}
                                            value="1"
                                            type="radio" 
                                            id="daftar_hadir_peserta-1" 
                                            name="daftar_hadir_peserta" class="custom-control-input">
                                        <label class="custom-control-label" for="daftar_hadir_peserta-1">Ada</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('daftar_hadir_peserta') === '0' ? 'checked' : '' }}
                                            value="0"
                                            type="radio" 
                                            id="daftar_hadir_peserta-2" 
                                            name="daftar_hadir_peserta" class="custom-control-input">
                                        <label class="custom-control-label" for="daftar_hadir_peserta-2">Tidak Ada</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-1 d-flex align-items-center">
                                    <label for="" class="mr-3 mb-0">Opsi Semua</label>
                                    <div class="custom-control custom-radio custom-control-inline mr-0">
                                        <input type="radio" id="option-sbu-1" name="option-sbu" class="custom-control-input is-valid">
                                        <label class="custom-control-label" for="option-sbu-1"></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="option-sbu-2" name="option-sbu" class="custom-control-input is-invalid">
                                        <label class="custom-control-label" for="option-sbu-2"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="" class="d-block">Kesesuaian dg SBU / PMK :</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ old('kesesuaian_sbu') === '1' ? 'checked' : '' }}
                                                value="1"
                                                type="radio" 
                                                id="kesesuaian_sbu-1" 
                                                name="kesesuaian_sbu" class="custom-control-input">
                                            <label class="custom-control-label" for="kesesuaian_sbu-1">Sesuai</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ old('kesesuaian_sbu') === '0' ? 'checked' : '' }}
                                                value="0"
                                                type="radio" 
                                                id="kesesuaian_sbu-2" 
                                                name="kesesuaian_sbu" class="custom-control-input">
                                            <label class="custom-control-label" for="kesesuaian_sbu-2">Tidak Sesuai</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="" class="d-block">Kesesuaian MAK :</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ old('kesesuaian_mak') === '1' ? 'checked' : '' }}
                                                value="1"
                                                type="radio" 
                                                id="kesesuaian_mak-1" 
                                                name="kesesuaian_mak" class="custom-control-input">
                                            <label class="custom-control-label" for="kesesuaian_mak-1">Sesuai</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ old('ksesuaian_mak') === '0' ? 'checked' : '' }}
                                                value="0"
                                                type="radio" 
                                                id="kesesuaian_mak-2" 
                                                name="kesesuaian_mak" class="custom-control-input">
                                            <label class="custom-control-label" for="kesesuaian_mak-2">Tidak Sesuai</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="" class="d-block">Kesesuaian dengan Laporan Kegiatan :</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ old('kesesuaian_laporan_kegiatan') === '1' ? 'checked' : '' }}
                                                value="1"
                                                type="radio" 
                                                id="kesesuaian_laporan_kegiatan-1" 
                                                name="kesesuaian_laporan_kegiatan" class="custom-control-input">
                                            <label class="custom-control-label" for="kesesuaian_laporan_kegiatan-1">Sesuai</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ old('kesesuaian_laporan_kegiatan') === '0' ? 'checked' : '' }}
                                                value="0"
                                                type="radio" 
                                                id="kesesuaian_laporan_kegiatan-2" 
                                                name="kesesuaian_laporan_kegiatan" class="custom-control-input">
                                            <label class="custom-control-label" for="kesesuaian_laporan_kegiatan-2">Tidak Sesuai</label>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- step 4 --}}
                    <div class="tab">
                        <div class="form-group">
                            <label for="">Temuan 1 :</label>
                            <select 
                                name="temuan[temuan1]" id="" 
                                class="selectpicker" title="Pilih Temuan" data-style="form-control" data-width="100%">
                                    @foreach ($kode_temuans as $temuan)
                                        <option value="{{ $temuan->id }}">{{ "[$temuan->kode] ".$temuan->detail }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Temuan 2 :</label>
                            <select 
                                name="temuan[temuan2]" id="" 
                                class="selectpicker" title="Pilih Temuan" data-style="form-control" data-width="100%">
                                @foreach ($kode_temuans as $temuan)
                                    <option value="{{ $temuan->id }}">{{ "[$temuan->kode] ".$temuan->detail }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Temuan 3 :</label>
                            <select 
                                name="temuan[temuan3]" id="" 
                                class="selectpicker" title="Pilih Temuan" data-style="form-control" data-width="100%">
                                @foreach ($kode_temuans as $temuan)
                                    <option value="{{ $temuan->id }}">{{ "[$temuan->kode] ".$temuan->detail }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Deskripsi Temuan dan Potensi TGR (tulis strip(-) jika tidak ada):</label>
                                    <textarea 
                                        name="deskripsi" 
                                        class="form-control" 
                                        id="" rows="2" required>{{ old('deskripsi') }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="font-weight-bold tx-18" for="">Ditulis di DTM :</label> <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('ditulis_dtm') === '1' ? 'checked' : '' }}
                                            value="1"
                                            type="radio" 
                                            id="ditulis_dtm-1" 
                                            name="ditulis_dtm" class="custom-control-input">
                                        <label class="custom-control-label" for="ditulis_dtm-1">
                                            <span class="badge badge-success"><i class="fas fa-check"></i></span> Iya 
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('ditulis_dtm') === '1' ? 'checked' : '' }}
                                            value="0"
                                            type="radio" 
                                            id="ditulis_dtm-2" 
                                            name="ditulis_dtm" class="custom-control-input">
                                        <label class="custom-control-label" for="ditulis_dtm-2">
                                            <span class="badge badge-secondary"><i class="fas fa-times"></i></span> Tidak 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="tab">
                        <div class="alert alert-warning">
                            Konfirmasi Submit Data ?
                        </div>
                    </div>


                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                </div>
                </form>
                <div class="modal-footer">
                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button class="btn btn-secondary" type="button" id="prevBtn" onclick="nextPrev(-1)">Kembali</button>
                            <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Selanjutnya <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of Modal add : #m-add --}}

    {{-- Modall edit : #m-edit --}}
    <div class="modal fade" tabindex="-1" id="m-edit" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Edit Kertas Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body load d-none">
                    <div class="d-flex flex-column align-items-center">
                        <h5>Loading Data...</h5>
                        <div class="spinner-grow" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-body success">
                    <div class="row mb-3">
                        <div class="col-lg">
                            <div class="text-grey mb-2">Unit Kerja : </div>
                            <h5 id="unitkerja-edit" class="text-dark font-weight-bold mb-4">Fakultas Ilmu Komputer</h5>
                        </div>
                        <div class="col-auto text-lg-right">
                            <div class="form-group">
                                <label class="font-weight-bold tx-18" for="">Ditulis di DTM :</label> <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        value="1"
                                        type="radio" 
                                        id="ditulis_dtm-edit-1" 
                                        name="ditulis_dtm" class="custom-control-input">
                                    <label class="custom-control-label" for="ditulis_dtm-edit-1">
                                        <span class="badge badge-success"><i class="fas fa-check"></i></span> Iya 
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        value="0"
                                        type="radio" 
                                        id="ditulis_dtm-edit-2" 
                                        name="ditulis_dtm" class="custom-control-input">
                                    <label class="custom-control-label" for="ditulis_dtm-edit-2">
                                        <span class="badge badge-secondary"><i class="fas fa-times"></i></span> Tidak 
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">ID Kertas Kerja :</label>
                                <input type="text" id="id-edit" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">No Buku :</label>
                                <input 
                                    name="no_buku"
                                    type="text" id="no_buku-edit" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">No SPJ :</label>
                                <input 
                                    name="no_spj"
                                    type="text" id="no_spj-edit" value="" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Tanggal Buku :</label>
                                <input
                                    name="tanggal_buku" 
                                    type="text" id="tanggal_buku-edit" value="23 Jan 2020" class="form-control mb-3" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal SPJ :</label>
                                <input
                                    name="tanggal_spj" 
                                    type="text" id="tanggal_spj-edit" value="23 Jan 2020" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label>Keterangan :</label>
                                <textarea name="keterangan" id="keterangan-edit" class="form-control" rows="6" disabled></textarea>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Nilai Transaksi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" id="nilai_transaksi-edit" value="25000" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Pajak Audite</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" id="pajak_audite-edit" value="100000" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="">Temuan Pajak :</label>
                                <textarea name="temuan_pajak" id="temuan_pajak-edit" class="form-control" rows="6" disabled></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="d-block">Kesesuaian PPN :</label>
                                <select 
                                    name="kesesuaian_ppn" 
                                    id="kesesuaian_ppn-edit" 
                                    class="selectpicker" 
                                    data-style="form-control" data-width="100%" disabled>
                                        @foreach ($kesesuaians as $kesesuaian)
                                            <option {{ old('kesesuaian_ppn') === $kesesuaian->id ? 'selected' : '' }} value="{{ $kesesuaian->id }}">{{ $kesesuaian->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="d-block">Kesesuaian PPh :</label>
                                <select 
                                    name="kesesuaian_pph" 
                                    id="kesesuaian_pph-edit" 
                                    class="selectpicker" 
                                    data-style="form-control" data-width="100%" disabled>
                                        @foreach ($kesesuaians as $kesesuaian)
                                            <option {{ old('kesesuaian_pph') === $kesesuaian->id ? 'selected' : '' }} value="{{ $kesesuaian->id }}">{{ $kesesuaian->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="d-block">Keterlambatan Penyetoran Pajak :</label>
                                <select 
                                    name="keterlambatan_penyetoran" 
                                    id="keterlambatan_penyetoran-edit" 
                                    class="selectpicker" 
                                    data-style="form-control" data-width="100%" disabled>
                                        @foreach ($keterlambatans as $keterlambatan)
                                            <option {{ old('keterlambatan_penyetoran') === $keterlambatan->id ? 'selected' : '' }} value="{{ $keterlambatan->id }}">{{ $keterlambatan->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">SSP :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('ssp') === '1' ? 'checked' : ''  }}
                                        name="ssp" 
                                        id="ssp-edit-1" 
                                        value="1"
                                        type="radio" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="ssp-edit-1">Ada</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('ssp') === '2' ? 'checked' : ''  }}
                                        name="ssp" 
                                        id="ssp-edit-2" 
                                        value="0"
                                        type="radio" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="ssp-edit-2">Tidak Ada</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kelengkapan ttd/materai/stempel/admin :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kelengkapan_ttd') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kelengkapan_ttd-edit-1" 
                                        name="kelengkapan_ttd" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kelengkapan_ttd-edit-1">Lengkap</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kelengkapan_ttd-edit') === '2' ? 'checked' : '' }}
                                        value="2"
                                        type="radio" 
                                        id="kelengkapan_ttd-edit-2" 
                                        name="kelengkapan_ttd" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kelengkapan_ttd-edit-2">Kurang Lengkap</label>
                                    </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kelengkapan_ttd-edit') === '3' ? 'checked' : '' }}
                                        value="3"
                                        type="radio" 
                                        id="kelengkapan_ttd-edit-3" 
                                        name="kelengkapan_ttd" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kelengkapan_ttd-edit-3">Tidak Lengkap</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kuitansi :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kuitansi') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kuitansi-edit-1" 
                                        name="kuitansi" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kuitansi-edit-1">Ada</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kuitansi') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kuitansi-edit-2" 
                                        name="kuitansi" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kuitansi-edit-2">Tidak Ada</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Surat Tugas / SK :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('surat_sk') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="surat_sk-edit-1" 
                                        name="surat_sk" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="surat_sk-edit-1">Ada</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('surat_sk') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="surat_sk-edit-2" 
                                        name="surat_sk" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="surat_sk-edit-2">Tidak Ada</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Daftar Hadir Peserta :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('daftar_hadir_peserta') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="daftar_hadir_peserta-edit-1" 
                                        name="daftar_hadir_peserta" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="daftar_hadir_peserta-edit-1">Ada</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('daftar_hadir_peserta') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="daftar_hadir_peserta-edit-2" 
                                        name="daftar_hadir_peserta" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="daftar_hadir_peserta-edit-2">Tidak Ada</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kesesuaian dg SBU / PMK :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kesesuaian_sbu') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kesesuaian_sbu-edit-1" 
                                        name="kesesuaian_sbu" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kesesuaian_sbu-edit-1">Sesuai</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kesesuaian_sbu') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kesesuaian_sbu-edit-2" 
                                        name="kesesuaian_sbu" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kesesuaian_sbu-edit-2">Tidak Sesuai</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kesesuaian MAK :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kesesuaian_mak') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kesesuaian_mak-edit-1" 
                                        name="kesesuaian_mak" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kesesuaian_mak-edit-1">Sesuai</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('ksesuaian_mak') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kesesuaian_mak-edit-2" 
                                        name="kesesuaian_mak" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kesesuaian_mak-edit-2">Tidak Sesuai</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kesesuaian dengan Laporan Kegiatan :</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('kesesuaian_laporan_kegiatan') === '1' ? 'checked' : '' }}
                                            value="1"
                                            type="radio" 
                                            id="kesesuaian_laporan_kegiatan-edit-1" 
                                            name="kesesuaian_laporan_kegiatan" class="custom-control-input" disabled>
                                        <label class="custom-control-label" for="kesesuaian_laporan_kegiatan-edit-1">Sesuai</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('kesesuaian_laporan_kegiatan') === '0' ? 'checked' : '' }}
                                            value="0"
                                            type="radio" 
                                            id="kesesuaian_laporan_kegiatan-edit-2" 
                                            name="kesesuaian_laporan_kegiatan" class="custom-control-input" disabled>
                                        <label class="custom-control-label" for="kesesuaian_laporan_kegiatan-edit-2">Tidak Sesuai</label>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    
                    <div class="text-grey mb-2">Temuan : </div>
                    <div id="temuan-wrapper-edit">
                        {{--  --}}
                    </div>
                    <div class="form-group mt-4">
                        <label for="">Deskripsi Temuan dan Potensi TGR </label>
                        <textarea name="deskripsi" id="deskripsi-edit" class="form-control" rows="2" disabled></textarea>
                    </div>


                    
                </div>
            </div>
        </div>
    </div>

    {{-- Modall detail : #m-detail --}}
    <div class="modal fade" tabindex="-1" id="m-detail" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Detail Kertas Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body load">
                    <div class="d-flex flex-column align-items-center">
                        <h5>Loading Data...</h5>
                        <div class="spinner-grow" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-body success">
                    <div class="row mb-3">
                        <div class="col-lg">
                            <div class="text-grey mb-2">Unit Kerja : </div>
                            <h5 id="unitkerja-detail" class="text-dark font-weight-bold mb-4">Fakultas Ilmu Komputer</h5>
                        </div>
                        <div class="col-auto text-lg-right">
                            <div>Ditulis DTM</div>
                            <div id="dtm-detail">
                                <span class="badge badge-success"><i class="fas fa-check"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">ID Kertas Kerja :</label>
                                <input type="text" id="id-detail" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">No Buku :</label>
                                <input type="text" id="no_buku-detail" value="1" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">No SPJ :</label>
                                <input type="text" id="no_spj-detail" value="13" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Tanggal Buku :</label>
                                <input type="text" id="tanggal_buku-detail" value="23 Jan 2020" class="form-control mb-3" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal SPJ :</label>
                                <input type="text" id="tanggal_spj-detail" value="23 Jan 2020" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label>Keterangan :</label>
                                <textarea name="keterangan" id="keterangan-detail" class="form-control" rows="6" disabled></textarea>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Nilai Transaksi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" id="nilai_transaksi-detail" value="25000" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Pajak Audite</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" id="pajak_audite-detail" value="100000" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="">Temuan Pajak :</label>
                                <textarea name="temuan_pajak" id="temuan_pajak-detail" class="form-control" rows="6" disabled></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="d-block">Kesesuaian PPN :</label>
                                <select 
                                    name="kesesuaian_ppn" 
                                    id="kesesuaian_ppn-detail" 
                                    class="selectpicker" 
                                    data-style="form-control" data-width="100%" disabled>
                                        @foreach ($kesesuaians as $kesesuaian)
                                            <option {{ old('kesesuaian_ppn') === $kesesuaian->id ? 'selected' : '' }} value="{{ $kesesuaian->id }}">{{ $kesesuaian->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="d-block">Kesesuaian PPh :</label>
                                <select 
                                    name="kesesuaian_pph" 
                                    id="kesesuaian_pph-detail" 
                                    class="selectpicker" 
                                    data-style="form-control" data-width="100%" disabled>
                                        @foreach ($kesesuaians as $kesesuaian)
                                            <option {{ old('kesesuaian_pph') === $kesesuaian->id ? 'selected' : '' }} value="{{ $kesesuaian->id }}">{{ $kesesuaian->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="d-block">Keterlambatan Penyetoran Pajak :</label>
                                <select 
                                    name="keterlambatan_penyetoran" 
                                    id="keterlambatan_penyetoran-detail" 
                                    class="selectpicker" 
                                    data-style="form-control" data-width="100%" disabled>
                                        @foreach ($keterlambatans as $keterlambatan)
                                            <option {{ old('keterlambatan_penyetoran') === $keterlambatan->id ? 'selected' : '' }} value="{{ $keterlambatan->id }}">{{ $keterlambatan->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">SSP :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('ssp') === '1' ? 'checked' : ''  }}
                                        name="ssp" 
                                        id="ssp-detail-1" 
                                        value="1"
                                        type="radio" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="ssp-detail-1">Ada</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('ssp') === '2' ? 'checked' : ''  }}
                                        name="ssp" 
                                        id="ssp-detail-2" 
                                        value="0"
                                        type="radio" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="ssp-detail-2">Tidak Ada</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kelengkapan ttd/materai/stempel/admin :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kelengkapan_ttd') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kelengkapan_ttd-detail-1" 
                                        name="kelengkapan_ttd" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kelengkapan_ttd-detail-1">Lengkap</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kelengkapan_ttd-detail') === '2' ? 'checked' : '' }}
                                        value="2"
                                        type="radio" 
                                        id="kelengkapan_ttd-detail-2" 
                                        name="kelengkapan_ttd" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kelengkapan_ttd-detail-2">Kurang Lengkap</label>
                                    </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kelengkapan_ttd-detail') === '3' ? 'checked' : '' }}
                                        value="3"
                                        type="radio" 
                                        id="kelengkapan_ttd-detail-3" 
                                        name="kelengkapan_ttd" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kelengkapan_ttd-detail-3">Tidak Lengkap</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kuitansi :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kuitansi') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kuitansi-detail-1" 
                                        name="kuitansi" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kuitansi-detail-1">Ada</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kuitansi') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kuitansi-detail-2" 
                                        name="kuitansi" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kuitansi-detail-2">Tidak Ada</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Surat Tugas / SK :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('surat_sk') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="surat_sk-detail-1" 
                                        name="surat_sk" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="surat_sk-detail-1">Ada</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('surat_sk') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="surat_sk-detail-2" 
                                        name="surat_sk" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="surat_sk-detail-2">Tidak Ada</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Daftar Hadir Peserta :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('daftar_hadir_peserta') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="daftar_hadir_peserta-detail-1" 
                                        name="daftar_hadir_peserta" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="daftar_hadir_peserta-detail-1">Ada</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('daftar_hadir_peserta') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="daftar_hadir_peserta-detail-2" 
                                        name="daftar_hadir_peserta" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="daftar_hadir_peserta-detail-2">Tidak Ada</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kesesuaian dg SBU / PMK :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kesesuaian_sbu') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kesesuaian_sbu-detail-1" 
                                        name="kesesuaian_sbu" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kesesuaian_sbu-detail-1">Sesuai</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kesesuaian_sbu') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kesesuaian_sbu-detail-2" 
                                        name="kesesuaian_sbu" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kesesuaian_sbu-detail-2">Tidak Sesuai</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kesesuaian MAK :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kesesuaian_mak') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kesesuaian_mak-detail-1" 
                                        name="kesesuaian_mak" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kesesuaian_mak-detail-1">Sesuai</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('ksesuaian_mak') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kesesuaian_mak-detail-2" 
                                        name="kesesuaian_mak" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kesesuaian_mak-detail-2">Tidak Sesuai</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kesesuaian dengan Laporan Kegiatan :</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('kesesuaian_laporan_kegiatan') === '1' ? 'checked' : '' }}
                                            value="1"
                                            type="radio" 
                                            id="kesesuaian_laporan_kegiatan-detail-1" 
                                            name="kesesuaian_laporan_kegiatan" class="custom-control-input" disabled>
                                        <label class="custom-control-label" for="kesesuaian_laporan_kegiatan-detail-1">Sesuai</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input 
                                            {{ old('kesesuaian_laporan_kegiatan') === '0' ? 'checked' : '' }}
                                            value="0"
                                            type="radio" 
                                            id="kesesuaian_laporan_kegiatan-detail-2" 
                                            name="kesesuaian_laporan_kegiatan" class="custom-control-input" disabled>
                                        <label class="custom-control-label" for="kesesuaian_laporan_kegiatan-detail-2">Tidak Sesuai</label>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    
                    <div class="text-grey mb-2">Temuan : </div>
                    <div id="temuan-wrapper-detail">
                        {{--  --}}
                    </div>
                    <div class="form-group mt-4">
                        <label for="">Deskripsi Temuan dan Potensi TGR </label>
                        <textarea name="deskripsi" id="deskripsi-detail" class="form-control" rows="2" disabled></textarea>
                    </div>


                    
                </div>
            </div>
        </div>
    </div>

@endsection
{{-- end of modal --}}

@section('style')
  <link rel="stylesheet" href="{{ asset('vendors/datatable/datatable.min.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/>
  <link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('vendors/bs-datetimepicker/bootstrap-datetimepicker.min.css') }}">
  <style>
      input[type="date"].is-invalid {
          padding-right: 25px !important;
      }
      .dt-checkboxes-cell th, .dt-checkboxes-cell td {
          width: 50px !important;
      }
      .dt-checkboxes-cell, .dt-checkboxes-cell {
          width: 50px !important;
          white-space: nowrap !important;
      }
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

    .form-control:disabled {
        background:  #f7f9f9 !important;
    }

    .bg-disabled {
        background-color: #f7f9f9 !important;
    }

    body {
        background-color: #f1f1f1;
    }

    #store {
        background-color: #ffffff;
        width: 100%;
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
        icons: {
            time: 'fas fa-clock'
        },
        timeZone:'Asia/Jakarta',
        widgetPositioning: {
            horizontal: 'auto',
            vertical:'bottom'
        },
        minDate: moment()
    });

    $(document).ready(function() {
        // $('#m-detail').modal('show');
        $('#m-edit').modal('show');
        const ajax_url = '{{ route('ajax.kertaskerjas') }}';
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
                        orthogonal: "dtm",
                        columns: [ ":visible" ]
                    }
                }, 
            ],
            responsive: true,
            "pagingType": "numbers",
            "language": {
                "lengthMenu": "Tampilkan _MENU_",
                "zeroRecords": "Tidak Ada Data",
                "info": "Menampilkan _PAGE_ dari _PAGES_ page",
                "infoEmpty": "Tidak Ada Data",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Cari Data Mitra:"
            },
            ajax: ajax_url,
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
            columns: [
                {data: 'id', name: 'id'},
                {data: 'id', name: 'id'},
                {data: 'no_buku', name: 'no_buku'},
                {data: 'no_spj', name: 'no_spj'},
                {data: 'keterangan', name: 'keterangan'},
                {data: 'dibuat', name: 'dibuat'},
                {
                    data: 'dtm', name: 'dtm',
                    render: function(data,type,row) {
                        if (type === 'dtm') {
                            return data === '1' ? 'Y' : 'N';
                        } 
                        if (type === 'sort') {
                            return data;
                        } 
                        if (data === '1') {
                            return '<span class="badge badge-success"><i class="fas fa-check"></i></span>';
                        } else {
                            return '<span class="badge badge-secondary"><i class="fas fa-times"></i></span>';
                        }
                        return data;
                    },
                },
                {
                    data: 'action', name: 'action',
                    createdCell: (cell, cellData, rowData, rowIndex, cellIndex) => {
                        // MODAL EDIT = #m-edit
                        $(cell).find('[data-edit-id]').on('click', function(e) {

                        })

                        // MODAL DETAIL = #m-detail
                        $(cell).find('[data-detail-id]').on('click', function(e) {
                            const detail_id = $(this).data('detail-id');
                            $.ajax({
                                url: `{{ route('ajax.getKertaskerjaById') }}/${detail_id}`,
                                beforeSend: function() {
                                    $('#m-detail').modal('show');
                                    $('#m-detail').find('.modal-body.load').show();
                                    $('#m-detail').find('.modal-body.success').hide();
                                },
                                success: function(result) {
                                    const kertaskerja = result.data;
                                    console.log(result);
                                    let temuan = kertaskerja.temuan !== null ? JSON.parse(kertaskerja.temuan).map((val) => {
                                        return `
                                        <div class="row mb-1">
                                            <div class="col-auto">${val.kode}</div>
                                            <div class="col">
                                                Penyetoran penerimaan negara/daerah atau kas di bendaharawan ke kas negara/daerah melebihi batas waktu yang ditentukan
                                            </div>
                                        </div>
                                        `;
                                    }) : '';
                                    // ajax data
                                    $('#unitkerja-detail').html(kertaskerja.nama_unitkerja)
                                    $('#id-detail').val(kertaskerja.id);
                                    $('#no_buku-detail').val(kertaskerja.no_buku);
                                    $('#no_spj-detail').val(kertaskerja.no_spj);
                                    $('#tanggal_buku-detail').val(kertaskerja.tanggal_buku);
                                    $('#tanggal_spj-detail').val(kertaskerja.tanggal_spj);
                                    $('#keterangan-detail').html(kertaskerja.keterangan);
                                    $('#nilai_transaksi-detail').val(kertaskerja.nilai_transaksi);
                                    $('#pajak_audite-detail').val(kertaskerja.pajak_audite);
                                    $('#temuan_pajak-detail').html(kertaskerja.temuan_pajak);
                                    $('#kesesuaian_ppn-detail').selectpicker('val',kertaskerja.kesesuaian_ppn);
                                    $('#kesesuaian_pph-detail').selectpicker('val',kertaskerja.kesesuaian_pph);
                                    $('#keterlambatan_penyetoran-detail').selectpicker('val',kertaskerja.keterlambatan_penyetoran);
                                    $('#temuan-wrapper-detail').html('').append(temuan);
                                    $('#deskripsi-detail').html(kertaskerja.deskripsi);

                                    kertaskerja.ditulis_dtm === '1' ? 
                                        $('#dtm-detail').html('<span class="badge badge-success"><i class="fas fa-check"></i></span>') : 
                                        $('#dtm-detail').html('<span class="badge badge-secondary"><i class="fas fa-times"></i></span>');
                                    kertaskerja.ssp === '1' ? $('#ssp-detail-1').attr('checked', true) : $('#ssp-detail-2').attr('checked', true);
                                    kertaskerja.kelengkapan_ttd === '1' ? $('#kelengkapan_ttd-detail-1').attr('checked', true) : (kertaskerja.kelengkapan_ttd === '2' ? $('#kelengkapan_ttd-detail-2').attr('checked', true) : $('#kelengkapan_ttd-detail-3').attr('checked', true));
                                    kertaskerja.kuitansi === '1' ? $('#kuitansi-detail-1').attr('checked', true) : $('#kuitansi-detail-2').attr('checked', true);
                                    kertaskerja.surat_sk === '1' ? $('#surat_sk-detail-1').attr('checked', true) : $('#surat_sk-detail-2').attr('checked', true);
                                    kertaskerja.daftar_hadir_peserta === '1' ? $('#daftar_hadir_peserta-detail-1').attr('checked', true) : $('#daftar_hadir_peserta-detail-2').attr('checked', true);
                                    kertaskerja.kesesuaian_sbu === '1' ? $('#kesesuaian_sbu-detail-1').attr('checked', true) : $('#kesesuaian_sbu-detail-2').attr('checked', true);
                                    kertaskerja.kesesuaian_mak === '1' ? $('#kesesuaian_mak-detail-1').attr('checked', true) : $('#kesesuaian_sbu-detail-2').attr('checked', true);
                                    kertaskerja.kesesuaian_laporan_kegiatan === '1' ? $('#kesesuaian_laporan_kegiatan-detail-1').attr('checked', true) : $('#kesesuaian_laporan_kegiatan-detail-2').attr('checked', true);
                                    
                                    // SHOW MODAL HIDE LOADER
                                    $('#m-detail').find('.modal-body.load').hide();
                                    $('#m-detail').find('.modal-body.success').show();
                                },
                                error: function(err) {
                                    console.log(err);
                                }
                            })
                        })
                    },
                    "searchable": false
                },
            ],
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
        if (n >= x.length-1) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Selanjutnya <i class='fas fa-arrow-right' style='font-size: 10px;'></i>";
        }
        if (n >= (x.length)) {
            $('#nextBtn').attr('data-dismiss', 'modal');
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
            document.getElementById("store").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        if (currentTab < x.length) {
            showTab(currentTab);
        }
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        // for (i = 0; i < y.length; i++) {
        //     // If a field is empty...
        //     if (y[i].value == "") {
        //     // add an "invalid" class to the field:
        //     console.log(y[i]);
        //     y[i].className += " is-invalid";
        //     // and set the current valid status to false
        //     valid = false;
        //     }
        // }
        // If the valid status is true, mark the step as finished and valid:
        // if (valid) {
        //     document.getElementsByClassName("step")[currentTab-1].className += " finish";
        // }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n-1].className += " active";
    }

</script>
@endsection