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
                            <th>No Buku</th>
                            <th>No SPJ</th>
                            <th>Keterangan</th>
                            <th>DTM</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th> 
                        </tr>
                    </thead>
                    <tbody>
                      @for ($i = 0; $i < 4; $i++)
                        <tr>
                          <td>{{ $i+1 }}</td>
                          <td>1</td>
                          <td>{{ rand(1,100) }}</td>
                          <td>{{ rand(1,100) }}</td>
                          <td>Pelatihan Keuangan Perusahaan</td>
                          <td><span class="badge badge-success">Iya</span></td>
                          <td>2 Jan 2020</td>
                          <td>
                            <button class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></button>
                            <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
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
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            {{-- input text/default --}}
            <div class="form-group">
                <label for="">Input Text (biasa)</label>
                <input type="text" class="form-control">
            </div>

            {{-- input number --}}
            <div class="form-group">
                <label for="">Input Number</label>
                <input type="number" class="form-control">
            </div>
            {{-- input date --}}
            <div class="form-group">
                <label for="">Input Date :</label>
                <input type="text" data-input="datetimepicker" class="form-control">
            </div>

            {{-- input radio --}}
            <div class="form-group">
                <label for="" class="d-block">Input Radio :</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Input Radio 1</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Input Radio 2</label>
                </div>
            </div>

            {{-- select --}}
            <div class="form-group">
                <label for="" class="d-block">Select</label>
                <select name="" id="" class="selectpicker" data-style="form-control">
                    <option value="1">Option 1</option>
                    <option value="1">Option 2</option>
                </select>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {{-- end of Modal add : #m-add --}}
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
</script>
@endsection