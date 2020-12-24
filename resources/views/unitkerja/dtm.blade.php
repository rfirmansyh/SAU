@extends('_layouts.app')

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
            <img src="{{ asset('storage/'.$unitkerja->photo) }}" alt="" class="img-fluid">
        </div>
        </div>
        <div class="col-md pl-3 mb-3 mb-md-0">
            <h5 class="my-0">{{ $unitkerja->name }}</h5>
            <span>{{ $unitkerja->description }}</span>
        </div>
        <div class="col-lg-4 mt-4 mt-lg-0">
            <form action="" id="select_unitkerja_id" method="get">
                <select 
                    name="select_unitkerja_id" 
                    class="selectpicker" 
                    data-style="form-control"
                    data-live-search="true" 
                    onchange=""
                    title="Cari Unitkerja..." 
                    data-width="100%">
                        @foreach ($unitkerjas as $u)
                            <option {{ $unitkerja->id === $u->id ? 'selected' : '' }} value="{{ $u->id }}">{{ $u->name }}</option>
                        @endforeach
                </select>
            </form>
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

  </style>
@endsection

@section('script')
    <script src="{{ asset('vendors/datatable/datatable.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/datatable-colvis.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/datatable-bs-button.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/datatable-select.min.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable-checkbox/dataTables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/datatable-bs.min.js') }}"></script>
    <script src="{{ asset('vendors/bs-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>


    <script>

        $('[name="select_unitkerja_id"]').on('change', function() {
            $('#select_unitkerja_id').submit();
        });


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
            // $('#m-edit').modal('show');

            const ajax_url = '{{ route('ajax.dtm', $unitkerja->id) }}';
            console.log(ajax_url);
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
                    "zeroRecords": "Tidak Ada Data DTM pada Unitkerja {{ $unitkerja->name }}",
                    "info": "Menampilkan _PAGE_ dari _PAGES_ page",
                    "infoEmpty": "Tidak Ada Data",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Cari Data DTM:"
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
                                const edit_id = $(this).data('edit-id');
                                $.ajax({
                                    url: `{{ route('ajax.getKertaskerjaById') }}/${edit_id}`,
                                    beforeSend: function() {
                                        $('#m-edit').modal('show');
                                        $('#m-edit').find('.modal-body.load').show();
                                        $('#m-edit').find('.modal-body.success').hide();
                                        $('#m-edit #form-edit').attr('action', `{{ route('kertaskerja.update') }}/${edit_id}`);
                                    },
                                    success: function(result) {
                                        const kertaskerja = result.data;
                                        console.log(kertaskerja);
                                        let temuan = kertaskerja.temuan !== null ? JSON.parse(kertaskerja.temuan) : null;
                                        console.log(temuan);

                                        // ajax data
                                        $('#unitkerja-edit').html(kertaskerja.nama_unitkerja)
                                        $('#id-edit').val(kertaskerja.id);
                                        $('#no_buku-edit').val(kertaskerja.no_buku);
                                        $('#no_spj-edit').val(kertaskerja.no_spj);
                                        $('#tanggal_buku-edit').val(kertaskerja.tanggal_buku);
                                        $('#tanggal_spj-edit').val(kertaskerja.tanggal_spj);
                                        $('#keterangan-edit').html(kertaskerja.keterangan);
                                        $('#nilai_transaksi-edit').val(kertaskerja.nilai_transaksi);
                                        $('#pajak_audite-edit').val(kertaskerja.pajak_audite);
                                        $('#temuan_pajak-edit').html(kertaskerja.temuan_pajak);
                                        $('#kesesuaian_ppn-edit').selectpicker('val',kertaskerja.kesesuaian_ppn);
                                        $('#kesesuaian_pph-edit').selectpicker('val',kertaskerja.kesesuaian_pph);
                                        $('#keterlambatan_penyetoran-edit').selectpicker('val',kertaskerja.keterlambatan_penyetoran);
                                        $('#deskripsi-edit').html(kertaskerja.deskripsi);

                                        removeAllChecked();

                                        kertaskerja.ditulis_dtm === '1' ? $('#ditulis_dtm-edit-1').attr('checked', true) : $('#ditulis_dtm-edit-2').attr('checked', true);
                                        kertaskerja.ssp === '1' ? $('#ssp-edit-1').attr('checked', true) : $('#ssp-edit-2').attr('checked', true);
                                        kertaskerja.kelengkapan_ttd === '1' ? $('#kelengkapan_ttd-edit-1').attr('checked', true) : (kertaskerja.kelengkapan_ttd === '2' ? $('#kelengkapan_ttd-edit-2').attr('checked', true) : $('#kelengkapan_ttd-edit-3').attr('checked', true));
                                        kertaskerja.kuitansi === '1' ? $('#kuitansi-edit-1').attr('checked', true) : $('#kuitansi-edit-2').attr('checked', true);
                                        kertaskerja.surat_sk === '1' ? $('#surat_sk-edit-1').attr('checked', true) : $('#surat_sk-edit-2').attr('checked', true);
                                        kertaskerja.daftar_hadir_peserta === '1' ? $('#daftar_hadir_peserta-edit-1').attr('checked', true) : $('#daftar_hadir_peserta-edit-2').attr('checked', true);
                                        kertaskerja.kesesuaian_sbu === '1' ? $('#kesesuaian_sbu-edit-1').attr('checked', true) : $('#kesesuaian_sbu-edit-2').attr('checked', true);
                                        kertaskerja.kesesuaian_mak === '1' ? $('#kesesuaian_mak-edit-1').attr('checked', true) : $('#kesesuaian_sbu-edit-2').attr('checked', true);
                                        kertaskerja.kesesuaian_laporan_kegiatan === '1' ? $('#kesesuaian_laporan_kegiatan-edit-1').attr('checked', true) : $('#kesesuaian_laporan_kegiatan-edit-2').attr('checked', true);

                                        (temuan[0] !== undefined)? $('#temuan-edit-1').selectpicker('val', temuan[0].id) : console.log(undefined);
                                        (temuan[1] !== undefined)? $('#temuan-edit-2').selectpicker('val', temuan[1].id) : console.log(undefined);
                                        (temuan[2] !== undefined)? $('#temuan-edit-3').selectpicker('val', temuan[2].id) : console.log(undefined);

                                        // SHOW MODAL HIDE LOADER
                                        $('#m-edit').find('.modal-body.load').hide();
                                        $('#m-edit').find('.modal-body.success').show();
                                    }
                                })
                            });

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
                                        console.log(kertaskerja);
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

                                        $('input[type="radio"]').attr('checked', false);

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


    </script>
@endsection