@extends('_layouts.app')

@section('title', 'Dashboard')

@section('header', 'Profil')
@section('breadcrumb')
	<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
	<div class="breadcrumb-item">Profil</div>
@endsection
@section('content-header')
	<h2 class="section-title">Profil Saya</h2>
@endsection

@section('content')
<div class="container">
	<div class="row d-flex justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-body p-0">
					<div class="row no-gutters">
						<div class="col-lg-4 d-flex flex-column align-items-center bg-primary text-white px-3 py-4">
							<div class="p-2 bg-primary rounded-circle border-white" style="border: .5rem solid">
								<div class="img-profile img-profile-sm">
									<img src="{{asset('img/unitkerja/fasilkom.png')}}">
								</div>
							</div>
							<h4 class="font-weight-bold mt-4 ">{{ $user->name }}</h4>
							<p class="font-italic">Auditor Unej</p>
						</div>
						<div class="col-lg p-4">
							<div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                  <i class="far fa-file-alt"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Kertas Kerja Dibuat</h4>
                    </div>
                    <div class="card-body">
                        <h5>{{ $user_kertaskerjas }}</h5>
                    </div>
                  </div>
              </div>
							<div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                  <i class="far fa-file-alt"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total DTM Dibuat</h4>
                    </div>
                    <div class="card-body">
                        <h5>{{ $user_dtm }}</h5>
                    </div>
                  </div>
              </div>
              
              @if (isset($code_decrypt))
              <form action="{{ route('profile.encrypt') }}" method="POST">
                @csrf
                <div class="form-grup">
                  <label for="">Kode Auditor Kamu</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="code" value="{{ $code_decrypt }}">
                    <div class="input-group-append csr-pointer">
                      <button type="submit" class="input-group-text bg-light" id="basic-addon2">Enkrip Kembali</button>
                    </div>
                  </div>
                </div>
              </form>  
              @else
              <form action="{{ route('profile.decrypt') }}" method="POST">
                @csrf
                <div class="form-grup">
                  <label for="">Kode Auditor Kamu</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="code" value="{{ $user->code }}">
                    <div class="input-group-append csr-pointer">
                      <button type="submit" class="input-group-text bg-light" id="basic-addon2">Dekripsi</button>
                    </div>
                  </div>
                </div>
              </form>    
              @endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Password:</label>
            <input type="password" class="form-control" id="message-text">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">Ubah</button>
      </div>
    </div>
  </div>
</div>
@endsection
{{-- sampek sini --}}

@section('style')

@endsection

@section('script')
@endsection