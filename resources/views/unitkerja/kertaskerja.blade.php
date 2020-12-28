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
  
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center gutters-xs">
                <div class="col-lg"><h5 class="text-dark mb-0">Semua Kertas Kerja</h5></div>
                <div class="col-md-auto">
                    <form action="{{ route('kertaskerja.delete', $unitkerja->id) }}" id="form-kertaskerja-delete" method="POST">
                        @csrf @method('DELETE')
                        {{-- just a wrapper for item to be deleted --}}
                        <div id="deleted-id-wrapper"></div> 
                        <button type="submit" id="btn-delete" class="btn btn-lg btn-danger" disabled>
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <a href="#m-add-kertaskerja" data-toggle="modal" class="btn btn-block btn-lg btn-primary"><i class="fas fa-plus mr-2"></i> Tambah Kertas Kerja</a>
                </div>
            </div>
        </div>
    </div>


    {{-- Datatable --}}
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center border-bottom pb-3 mb-3">
                <div class="col-md">Export Data</div>
                <div class="col-md-auto" id="col-export-table"></div>
            </div>
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
                        {{-- <tr>
                            <th></th>
                            <th>ID</th>
                            <th>No. Buku</th>
                            <th>No. SPJ</th>
                            <th>Keterangan</th>
                            <th>Dibuat Pada</th>
                            <th>Ditulis DTM</th>
                            <th>Aksi</th> 
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection

{{-- modal --}}
@section('modal')

    @component('unitkerja.components.modal-add') 
        @slot('unitkerja', $unitkerja)
        @slot('kesesuaians', $kesesuaians)
        @slot('keterlambatans', $keterlambatans)
        @slot('kode_temuans', $kode_temuans)
    @endcomponent

    @component('unitkerja.components.modal-edit') 
        @slot('kesesuaians', $kesesuaians)
        @slot('keterlambatans', $keterlambatans)
        @slot('kode_temuans', $kode_temuans)
    @endcomponent

    @component('unitkerja.components.modal-detail') 
        @slot('kesesuaians', $kesesuaians)
        @slot('keterlambatans', $keterlambatans)
        @slot('kode_temuans', $kode_temuans)
    @endcomponent

@endsection
{{-- end of modal --}}

@section('style')
  <link rel="stylesheet" href="{{ asset('vendors/datatable/datatable.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/datatable/datatable-button-group.min.css') }}">
  {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/> --}}
  {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/> --}}
  <link rel="stylesheet" href="{{ asset('vendors/datatable-checkbox/dataTables.checkboxes.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/bs-datetimepicker/bootstrap-datetimepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">
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
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script> --}}
    <script src="{{ asset('vendors/datatable/datatable.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/datatable-colvis.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/datatable-bs-button.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/datatable-select.min.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable-checkbox/dataTables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/datatable-bs.min.js') }}"></script>
    <script src="{{ asset('vendors/bs-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>

    <script>

        // IF HAS ERROR ON MODAL ADD/STORE
        @if($errors->first('type') === 'store')    
			$('#m-add-kertaskerja .alert').removeClass('d-none');
            $('#m-add-kertaskerja').modal('show');
        @endif        
        
        // IF HAS ERROR ON MODAL EDIT/UPDDATE
        @if($errors->first('type') === 'update')    
            const edit_id = JSON.parse('{!! json_encode($errors->first('editId')) !!}');
            console.log(JSON.parse('{!! json_encode(old("no_spj")) !!}'));
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
                    let temuan = kertaskerja.temuan !== null ? JSON.parse(kertaskerja.temuan) : null;

                    // ajax data
                    $('#unitkerja-edit').html(kertaskerja.nama_unitkerja)
                    $('#id-edit').val(kertaskerja.id);
                    // $('#no_buku-edit').val(JSON.parse('{!! json_encode(old("no_buku")) !!}') === null ?  '' : kertaskerja.no_buku);
                    // $('#no_spj-edit').val(JSON.parse('{!! json_encode(old("no_spj")) !!}') === null ?  '' : kertaskerja.no_spj);
                    $('#tanggal_buku-edit').val( JSON.parse('{!! json_encode(old("tanggal_buku")) !!}') === null ?  '' : kertaskerja.tanggal_buku );
                    $('#tanggal_spj-edit').val( JSON.parse('{!! json_encode(old("tanggal_spj")) !!}') === null ?  '' : kertaskerja.tanggal_spj );
                    // $('#keterangan-edit').html(kertaskerja.keterangan);
                    // $('#nilai_transaksi-edit').val(kertaskerja.nilai_transaksi);
                    // $('#pajak_audite-edit').val(kertaskerja.pajak_audite);
                    // $('#temuan_pajak-edit').html(kertaskerja.temuan_pajak);
                    // $('#kesesuaian_ppn-edit').selectpicker('val',kertaskerja.kesesuaian_ppn);
                    // $('#kesesuaian_pph-edit').selectpicker('val',kertaskerja.kesesuaian_pph);
                    // $('#keterlambatan_penyetoran-edit').selectpicker('val',kertaskerja.keterlambatan_penyetoran);
                    // $('#deskripsi-edit').html(kertaskerja.deskripsi);


                    // kertaskerja.ditulis_dtm === '1' ? $('#ditulis_dtm-edit-1').attr('checked', true) : $('#ditulis_dtm-edit-2').attr('checked', true);
                    // kertaskerja.ssp === '1' ? $('#ssp-edit-1').attr('checked', true) : $('#ssp-edit-2').attr('checked', true);
                    // kertaskerja.kelengkapan_ttd === '1' ? $('#kelengkapan_ttd-edit-1').attr('checked', true) : (kertaskerja.kelengkapan_ttd === '2' ? $('#kelengkapan_ttd-edit-2').attr('checked', true) : $('#kelengkapan_ttd-edit-3').attr('checked', true));
                    // kertaskerja.kuitansi === '1' ? $('#kuitansi-edit-1').attr('checked', true) : $('#kuitansi-edit-2').attr('checked', true);
                    // kertaskerja.surat_sk === '1' ? $('#surat_sk-edit-1').attr('checked', true) : $('#surat_sk-edit-2').attr('checked', true);
                    // kertaskerja.daftar_hadir_peserta === '1' ? $('#daftar_hadir_peserta-edit-1').attr('checked', true) : $('#daftar_hadir_peserta-edit-2').attr('checked', true);
                    // kertaskerja.kesesuaian_sbu === '1' ? $('#kesesuaian_sbu-edit-1').attr('checked', true) : $('#kesesuaian_sbu-edit-2').attr('checked', true);
                    // kertaskerja.kesesuaian_mak === '1' ? $('#kesesuaian_mak-edit-1').attr('checked', true) : $('#kesesuaian_mak-edit-2').attr('checked', true);
                    // kertaskerja.kesesuaian_laporan_kegiatan === '1' ? $('#kesesuaian_laporan_kegiatan-edit-1').attr('checked', true) : $('#kesesuaian_laporan_kegiatan-edit-2').attr('checked', true);

                    (temuan[0] !== undefined) ? $('#temuan-edit-1').selectpicker('val', temuan[0].id) : $('#temuan-edit-1').selectpicker('val', null);
                    (temuan[1] !== undefined) ? $('#temuan-edit-2').selectpicker('val', temuan[1].id) : $('#temuan-edit-2').selectpicker('val', null);
                    (temuan[2] !== undefined) ? $('#temuan-edit-3').selectpicker('val', temuan[2].id) : $('#temuan-edit-3').selectpicker('val', null);

                    // SHOW MODAL HIDE LOADER
                    $('#m-edit').find('.modal-body.load').hide();
                    $('#m-edit').find('.modal-body.success').show();
                }
            })
        @endif      
        
        // INIT UNITKERJA
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
            }
        });

        const ajax_url = '{{ route('ajax.kertaskerjas', $unitkerja->id) }}';
        var table;
        $(document).ready(function() {

            table = $('#datatable').DataTable({
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
                responsive: false,
                "pagingType": "numbers",
                "language": {
                    "lengthMenu": "Tampilkan _MENU_",
                    "zeroRecords": "Tidak Ada Data",
                    "info": "Menampilkan _PAGE_ dari _PAGES_ page",
                    "infoEmpty": "Tidak Ada Data",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Cari Data Kertas Kerja:"
                },
                // ajax: ajax_url,
                // serverSide: true,
                preDrawCallback: () => {
                    $('#datatable').loader(true);
                },
                'columnDefs': [
                    {
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true,
                            'selectCallback': function(nodes, selected) {
                                if (table.column(0).checkboxes.selected().length > 0) {
                                    $('#btn-delete').removeAttr('disabled');
                                } else {
                                    $('#btn-delete').attr('disabled', true);
                                }
                            }
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

                                        $('input').removeAttr('checked');

                                        kertaskerja.ditulis_dtm === '1' ? $('#ditulis_dtm-edit-1').attr('checked', true) : $('#ditulis_dtm-edit-2').attr('checked', true);
                                        kertaskerja.ssp === '1' ? $('#ssp-edit-1').attr('checked', true) : $('#ssp-edit-2').attr('checked', true);
                                        kertaskerja.kelengkapan_ttd === '1' ? $('#kelengkapan_ttd-edit-1').attr('checked', true) : (kertaskerja.kelengkapan_ttd === '2' ? $('#kelengkapan_ttd-edit-2').attr('checked', true) : $('#kelengkapan_ttd-edit-3').attr('checked', true));
                                        kertaskerja.kuitansi === '1' ? $('#kuitansi-edit-1').attr('checked', true) : $('#kuitansi-edit-2').attr('checked', true);
                                        kertaskerja.surat_sk === '1' ? $('#surat_sk-edit-1').attr('checked', true) : $('#surat_sk-edit-2').attr('checked', true);
                                        kertaskerja.daftar_hadir_peserta === '1' ? $('#daftar_hadir_peserta-edit-1').attr('checked', true) : $('#daftar_hadir_peserta-edit-2').attr('checked', true);
                                        kertaskerja.kesesuaian_sbu === '1' ? $('#kesesuaian_sbu-edit-1').attr('checked', true) : $('#kesesuaian_sbu-edit-2').attr('checked', true);
                                        kertaskerja.kesesuaian_mak === '1' ? $('#kesesuaian_mak-edit-1').attr('checked', true) : $('#kesesuaian_mak-edit-2').attr('checked', true);
                                        kertaskerja.kesesuaian_laporan_kegiatan === '1' ? $('#kesesuaian_laporan_kegiatan-edit-1').attr('checked', true) : $('#kesesuaian_laporan_kegiatan-edit-2').attr('checked', true);
                                        
                                        (temuan[0] !== undefined) ? $('#temuan-edit-1').selectpicker('val', temuan[0].id) : $('#temuan-edit-1').selectpicker('val', null);
                                        (temuan[1] !== undefined) ? $('#temuan-edit-2').selectpicker('val', temuan[1].id) : $('#temuan-edit-2').selectpicker('val', null);
                                        (temuan[2] !== undefined) ? $('#temuan-edit-3').selectpicker('val', temuan[2].id) : $('#temuan-edit-3').selectpicker('val', null);

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

                                        $('input').attr('checked', false);

                                        kertaskerja.ditulis_dtm === '1' ? 
                                            $('#dtm-detail').html('<span class="badge badge-success"><i class="fas fa-check"></i></span>') : 
                                            $('#dtm-detail').html('<span class="badge badge-secondary"><i class="fas fa-times"></i></span>');
                                        kertaskerja.ssp === '1' ? $('#ssp-detail-1').attr('checked', true) : $('#ssp-detail-2').attr('checked', true);
                                        kertaskerja.kelengkapan_ttd === '1' ? $('#kelengkapan_ttd-detail-1').attr('checked', true) : (kertaskerja.kelengkapan_ttd === '2' ? $('#kelengkapan_ttd-detail-2').attr('checked', true) : $('#kelengkapan_ttd-detail-3').attr('checked', true));
                                        kertaskerja.kuitansi === '1' ? $('#kuitansi-detail-1').attr('checked', true) : $('#kuitansi-detail-2').attr('checked', true);
                                        kertaskerja.surat_sk === '1' ? $('#surat_sk-detail-1').attr('checked', true) : $('#surat_sk-detail-2').attr('checked', true);
                                        kertaskerja.daftar_hadir_peserta === '1' ? $('#daftar_hadir_peserta-detail-1').attr('checked', true) : $('#daftar_hadir_peserta-detail-2').attr('checked', true);
                                        kertaskerja.kesesuaian_sbu === '1' ? $('#kesesuaian_sbu-detail-1').attr('checked', true) : $('#kesesuaian_sbu-detail-2').attr('checked', true);
                                        kertaskerja.kesesuaian_mak === '1' ? $('#kesesuaian_mak-detail-1').attr('checked', true) : $('#kesesuaian_mak-detail-2').attr('checked', true);
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
                drawCallback: () => {
                    $('#datatable').loader(false);
                },
            });
            table.buttons().container().appendTo('#col-export-table');
            
        });

        

        $('#form-kertaskerja-delete').on('submit', function(e){
            e.preventDefault();
            var form = this;
            var rows_selected = table.column(0).checkboxes.selected();

            Swal.fire({
                title: 'Hapus Data ?',
                text: "Dengan Menghapus data ini, anda tidak dapat mengembalikannya",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Hapus!',
                cancelButtonText: 'Batal'
                }).then((result) => {
                if (result.isConfirmed) {
                    $(form).find('#deleted-id-wrapper').html('');
                    // Iterate over all selected checkboxes
                    $.each(rows_selected, function(index, rowId){
                        // Create a hidden element
                        $(form).find('#deleted-id-wrapper').append(
                            $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', 'id[]')
                                .val(rowId)
                        );
                    });

                    form.submit();         
                }
            })

        });

        var currentTab = 0; 
        showTab(currentTab);
        // TOGGLING ALL ON FORM WIZARD
        $('#sesuai-1').on('change', function() {
            $('input#kuitansi-1').removeAttr('checked');
            $('input#surat_sk-1').removeAttr('checked');
            $('input#daftar_hadir_peserta-1').removeAttr('checked');
            $('input#kuitansi-2').removeAttr('checked');
            $('input#surat_sk-2').removeAttr('checked');
            $('input#daftar_hadir_peserta-2').removeAttr('checked');
            if ($(this).prop('checked')) {
                $('input#kuitansi-1').attr('checked', true); 
                $('input#surat_sk-1').attr('checked', true); 
                $('input#daftar_hadir_peserta-1').attr('checked', true); 
            } else {
                $('input#kuitansi-2').attr('checked', true); 
                $('input#surat_sk-2').attr('checked', true); 
                $('input#daftar_hadir_peserta-2').attr('checked', true); 
            }
        })
        $('#sesuai-2').on('change', function() {
            $('input#kesesuaian_sbu-1').removeAttr('checked');
            $('input#kesesuaian_mak-1').removeAttr('checked');
            $('input#kesesuaian_laporan_kegiatan-1').removeAttr('checked');
            $('input#kesesuaian_sbu-2').removeAttr('checked');
            $('input#kesesuaian_mak-2').removeAttr('checked');
            $('input#kesesuaian_laporan_kegiatan-2').removeAttr('checked');
            if ($(this).prop('checked')) {
                $('input#kesesuaian_sbu-1').attr('checked', true); 
                $('input#kesesuaian_mak-1').attr('checked', true); 
                $('input#kesesuaian_laporan_kegiatan-1').attr('checked', true); 
            } else {
                $('input#kesesuaian_sbu-2').attr('checked', true); 
                $('input#kesesuaian_mak-2').attr('checked', true); 
                $('input#kesesuaian_laporan_kegiatan-2').attr('checked', true); 
            }
        })

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
            y = x[currentTab].querySelectorAll("input, select");
            // A loop that checks every input field in the current tab:
            
            for (i = 0; i < y.length; i++) {
                if ( y[i].type === 'select-one' ) {
                    if ($(y[i]).val() === '' && y[i].hasAttribute('required')) {
                        // $(y[i]).selectpicker('setStyle', 'is-invalid', 'add');
                        $(y[i]).addClass('is-invalid').selectpicker('setStyle');
                        valid = false;
                    } else {
                        // $(y[i]).selectpicker('setStyle', 'is-invalid', 'remove');
                        $(y[i]).parent().removeClass('is-invalid').selectpicker('setStyle');
                    }
                }
                if (y[i].name === 'ssp') {
                    if ( $('input[name='+ y[i].name +']:checked').length === 0 ) {
                        y[i].classList.add('is-invalid');
                        valid = false;
                    } else {
                        y[i].classList.remove("is-invalid");
                    }
                } 
                if (y[i].name === 'kelengkapan_ttd') {
                    if ( $('input[name='+ y[i].name +']:checked').length === 0 ) {
                        y[i].classList.add('is-invalid');
                        valid = false;
                    } else {
                        y[i].classList.remove("is-invalid");
                    }
                } 
                if (y[i].name === 'kuitansi') {
                    if ( $('input[name='+ y[i].name +']:checked').length === 0 ) {
                        y[i].classList.add('is-invalid');
                        valid = false;
                    } else {
                        y[i].classList.remove("is-invalid");
                    }
                } 
                if (y[i].name === 'surat_sk') {
                    if ( $('input[name='+ y[i].name +']:checked').length === 0 ) {
                        y[i].classList.add('is-invalid');
                        valid = false;
                    } else {
                        y[i].classList.remove("is-invalid");
                    }
                } 
                if (y[i].name === 'daftar_hadir_peserta') {
                    if ( $('input[name='+ y[i].name +']:checked').length === 0 ) {
                        y[i].classList.add('is-invalid');
                        valid = false;
                    } else {
                        y[i].classList.remove("is-invalid");
                    }
                } 
                if (y[i].name === 'daftar_hadir_peserta') {
                    if ( $('input[name='+ y[i].name +']:checked').length === 0 ) {
                        y[i].classList.add('is-invalid');
                        valid = false;
                    } else {
                        y[i].classList.remove("is-invalid");
                    }
                } 
                if (y[i].name === 'kesesuaian_sbu') {
                    if ( $('input[name='+ y[i].name +']:checked').length === 0 ) {
                        y[i].classList.add('is-invalid');
                        valid = false;
                    } else {
                        y[i].classList.remove("is-invalid");
                    }
                } 
                if (y[i].name === 'kesesuaian_mak') {
                    if ( $('input[name='+ y[i].name +']:checked').length === 0 ) {
                        y[i].classList.add('is-invalid');
                        valid = false;
                    } else {
                        y[i].classList.remove("is-invalid");
                    }
                } 
                if (y[i].name === 'kesesuaian_laporan_kegiatan') {
                    if ( $('input[name='+ y[i].name +']:checked').length === 0 ) {
                        y[i].classList.add('is-invalid');
                        valid = false;
                    } else {
                        y[i].classList.remove("is-invalid");
                    }
                } 
                if (y[i].name === 'ditulis_dtm') {
                    if ( $('input[name='+ y[i].name +']:checked').length === 0 ) {
                        y[i].classList.add('is-invalid');
                        valid = false;
                    } else {
                        y[i].classList.remove("is-invalid");
                    }
                } 
                if (y[i].type === 'text' || y[i].type === 'number') {
                    if (y[i].value === ""  && y[i].hasAttribute('required')) {
                        y[i].className += " is-invalid";
                        $('#m-add-kertaskerja form').addClass('was-validate');
                        valid = false;
                    } else {
                        y[i].classList.remove("is-invalid");
                    }
                }
            }
            // valid = true; // TESTING
            return valid; 
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