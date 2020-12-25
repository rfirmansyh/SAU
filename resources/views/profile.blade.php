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
				<div class="card-body">
					<div class="row">
						<div class="col-lg-4 d-flex flex-column align-items-center">
							<div class="p-2 bg-white rounded-circle border-primary" style="border: .5rem solid">
								<div class="img-profile img-profile-sm">
									<img src="{{asset('img/unitkerja/fasilkom.png')}}"></img>
								</div>
							</div>
							<h2 class="font-weight-bold mt-4 ">user</h2>
							<p class="font-italic">user12</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 bg-primary rounded-left">
					<div class="card-blok text-center text-white">
						<img src="{{asset('img/unitkerja/fasilkom.png')}}" class="rounded-circle mt-5 border border-white" width="100px" height="100px"></img>
						<h2 class="font-weight-bold mt-4 ">user</h2>
						<p class="font-italic">user12</p>
						<i data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="fa fa-edit mb-4" style="cursor: pointer; font-size:25px;"></i>
					</div>
				</div>
				<div class="col-sm-8 bg-white rounded-right">

				<h3 class="mt-3 text-center">Information</h3>
				<hr class="badge-primary mt-0 w-25">
				<div class="row mt-5">
					<div class="col-sm-6">
						<p class="font-weight-bold">Email</p>
						<h6 class="text-muted">user@gmail.com</h6>
					</div>
					<div class="col-sm-6">
						<p class="font-weight-bold">Status</p>
						<button class="border-0 bg-success rounded-pill text-white">Aktif</button>
					</div>
					<div class="col-sm-6 mt-3">
						<p class="font-weight-bold">Nomor Hp</p>
						<h6 class="text-muted">0085123456789</h6>
					</div>
					<div class="col-sm-6 mt-3">
						<p class="font-weight-bold">Bio</p>
						<h6 class="text-muted">Saya adalah auditor</h6>
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