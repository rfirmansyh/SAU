@extends('ui._layouts.app')

@section('title', 'Dashboard')

@section('header', 'Daftar Unit Kerja')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Unit Kerja</a></div>
@endsection
@section('content-header')
  <div class="row align-items-center justify-content-between">
    <div class="col-md mb-3 mb-md-0">
        <h2 class="section-title mb-2">
            Semua Data Unit Kerja
        </h2>
    </div>
    <div class="col-md-auto"><a href="#m-add-unitkerja" class="btn btn-block btn-lg btn-primary"><i class="fas fa-plus mr-2"></i> Tambah Data Unit Kerja</a></div>
  </div>
@endsection

@section('content')
  {{-- Table --}}
  <div class="card">
    <div class="card-header">
      <h4>Advanced Table</h4>
      <div class="card-header-form">
        <form>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-btn">
              <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>
              <div class="custom-checkbox custom-control">
                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
              </div>
            </th>
            <th>ID</th>
            <th>Unit Kerja</th>
            <th>Deskripsi</th>
            <th>Dibuat Pada</th>
            <th>Terakhir Diubah</th>
            <th>Action</th>
          </tr>
          <tr>
            <td>
              <div class="custom-checkbox custom-control">
                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
              </div>
            </td>
            <td>1</td>
            <td class="align-middle">
              Fakultas Ilmu Komputer
            </td>
            <td>2018-04-10</td>
            <td>2018-04-10</td>
            <td>2018-04-10</td>
            <td>
                <a href="#m-detail-unitkerja" class="btn btn-sm btn-outline-primary">Detail</a>
                <a href="{{ url('ui/unitkerja/show') }}" class="btn btn-sm btn-primary">Tampilkan Data</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
          <ul class="pagination mb-0">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
            </li>
          </ul>
        </nav>
      </div>
  </div>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
    <script src="{{ asset('js/page/components-table.js') }}"></script>
@endsection