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
					<div class="row">
						<div class="col-lg-4 d-flex flex-column align-items-center bg-primary text-white px-3 py-4">
							<div class="p-2 bg-primary rounded-circle border-white" style="border: .5rem solid">
								<div class="img-profile img-profile-sm">
									<img src="{{asset('img/unitkerja/fasilkom.png')}}"></img>
								</div>
							</div>
							<h4 class="font-weight-bold mt-4 ">Zarah Puspita</h4>
							<p class="font-italic">Auditor Unej</p>
						</div>
						<div class="col-lg-4">
							
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