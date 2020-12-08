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
    <div class="col-md-auto">
      <a href="#m-add-unitkerja" data-toggle="modal" class="btn btn-block btn-lg btn-primary"><i class="fas fa-plus mr-2"></i> Tambah Data Unit Kerja</a>
    </div>
  </div>
@endsection

@section('content')
<div class="row align-items-end gutters-xs border-bottom pb-4 mb-5"> 
  <div class="col-md">
      <div class="form-group mb-md-0">
          <label for="">Cari Unit Kerja</label>
          <input type="text" class="form-control" placeholder="Masukan Nama / Lokasi Unit Kerja Dicari">
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="font-weight-bold">Fakultas Ilmu Komputer</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 col-lg-5 mb-3 mb-md-0">
            <div class="img-card">
              <img src="{{ asset('img/unitkerja/fasilkom.png') }}" alt="">
            </div>
          </div>
          <div class="col-md-6 col-lg-6 d-flex flex-column justify-content-between">
            <div>
              <div class="font-weight-bold">Unit kerja ID : 1</div>
              <hr class="my-2">
              <p>Merupakan Unit Kerja Yang ada di Fakultas Ilmu Komputer</p>
            </div>

            <div>
              <small class="text-dark d-block">Sumber Dana :</small>
              <span class="badge badge-success badge-sm rounded-sm">Rupiah Murni</span>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end border-top border-light">
        <button class="btn btn-warning mr-2">Ubah</button>
        <button class="btn btn-primary">Detail</button>
      </div>
    </div>
  </div>
</div>
@endsection

{{-- modal --}}
@section('modal')
  {{-- Modal add : #m-add --}}
  <div class="modal fade" tabindex="-1" id="m-add-unitkerja" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
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
  <style>
    .img-card {
      width: 100%;
      height: 180px;
    }
    .img-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      -o-object-fit: cover;
    }
    @media screen and (max-width: 420px) {
      .img-card {
        height: 120px;
      }
    }
  </style>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
    <script src="{{ asset('js/page/components-table.js') }}"></script>
@endsection