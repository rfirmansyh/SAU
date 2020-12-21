@extends('_layouts.app')

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
		@foreach ($unitkerjas as $unitkerja)
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h3 class="font-weight-bold">{{ $unitkerja->name }}</h3>
					</div>
					<div class="card-body">
						<div class="row">
						<div class="col-md-6 col-lg-5 mb-3 mb-md-0">
							<div class="img-card">
							<img src="{{ asset('storage/'.$unitkerja->photo) }}" alt="">
							</div>
						</div>
						<div class="col-md-6 col-lg-6 d-flex flex-column justify-content-between">
							<div>
							<div class="font-weight-bold">Unit kerja ID : {{ $unitkerja->id }}</div>
							<hr class="my-2">
							<p>{{ $unitkerja->description }}</p>
							</div>

							<div>
							<small class="text-dark d-block">Sumber Dana :</small>
							<span class="badge badge-success badge-sm rounded-sm">{{ $unitkerja->sumberdana->name }}</span>
							</div>
						</div>
						</div>
					</div>
					<div class="card-footer d-flex justify-content-end border-top border-light">
						<button data-toggle="modal" data-unitkerja-id="{{ $unitkerja->id }}" data-target="#m-edit" class="btn btn-warning mr-2">Ubah</button>
						<a href="{{ route('kertaskerja.index', $unitkerja->id) }}" class="btn btn-primary">Detail</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<div class="row justify-content-center justify-content-md-end">
        <div class="col-auto">{{$unitkerjas->appends(Request::all())->links()}}</div>
	</div>
	
@endsection

{{-- modal : modal garapnya dari sini --}}
@section('modal')


  	{{-- Modal add : #m-add --}}
    <div class="modal fade" tabindex="-1" id="m-add-unitkerja" role="dialog">
      	<div class="modal-dialog" role="document">
        	<div class="modal-content">
          		<div class="modal-header">
					<h5 class="modal-title">Tambah Unit Kerja</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{ route('unitkerja.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
					<div class="card card-body">
						<div class="img-unitkerja">
							<img src="" alt="" id="img-unitkerja">
						</div>
					</div>
					<div class="form-group">
						<label for="">Foto Unit Kerja</label>
						<div class="custom-file">
							<input 
								type="file" 
								name="photo"
								id="customFile" onchange="openFile(event, '#img-unitkerja')"
								class="custom-file-input">
							<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>
					<div class="form-group">
						<label for="">Nama Unit Kerja</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}">
					</div>
					<div class="form-group">
						<label for="">Deskripsi Unit Kerja</label>
						<textarea name="description" class="form-control">{{ old('description') }}</textarea>
					</div>
					<div class="form-group">
						<label for="" class="d-block">Pilih Sumberdana</label>
						<select name="sumberdana_id" id="" class="selectpicker" data-style="form-control" data-width="100%">
							@foreach ($sumberdanas as $s)
								<option {{ old('sumberdana_id') === $s->id ? 'selected' : '' }} value="{{ $s->id }}">{{ $s->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Tambahkan</button>
				</div>
				</form>
        	</div>
      	</div>
    </div>
    {{-- end of Modal add : #m-add --}}


    {{-- Modal edit : #m-edit --}}
    <div class="modal fade" tabindex="-1" id="m-edit" role="dialog">
      	<div class="modal-dialog" role="document">
        	<div class="modal-content">

         	 <div class="modal-header">
				<h5 class="modal-title">Ubah Unit Kerja</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
          	</div>

			<div class="modal-body">
			<form action="" method="POST" id="form-m-edit" enctype="multipart/form-data">
				@csrf @method('PUT')
				<div class="card card-body">
					<div class="img-unitkerja">
						<img src="" alt="" id="img-unitkerja-edit">
					</div>
				</div>
			  	<div class="form-group">
					<label for="">Foto Unit Kerja</label>
					<div class="custom-file">
						<input 
							type="file" 
							name="photo"
							id="customFile" onchange="openFile(event, '#img-unitkerja-edit')"
							class="custom-file-input">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>
			  	</div>
			  	<div class="form-group">
					<label for="">Nama Unit Kerja</label>
					<input type="text" name="name" id="name-m-edit" class="form-control @error('name') is-invalid @enderror">
					@error('name')
						<span class="tx-12 text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
			  	</div>
			  	<div class="form-group">
					<label for="">Deskripsi Unit Kerja</label>
					<textarea name="description" id="description-m-edit" class="form-control @error('description') is-invalid @enderror"></textarea>
					@error('description')
						<span class="tx-12 text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
			  	</div>
			 	<div class="form-group">
					<label for="" class="d-block">Pilih Sumberdana</label>
					<select name="sumberdana_id" id="sumberdana-m-edit" class="selectpicker @error('sumberdana_id') is-invalid @enderror" data-style="form-control" data-width="100%">
						@foreach ($sumberdanas as $s)
							<option {{ old('sumberdana_id') === $s->id ? 'selected' : '' }} value="{{ $s->id }}">{{ $s->name }}</option>
						@endforeach
					</select>
					@error('sumberdana_id')
						<span class="tx-12 text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
			 	 </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Ubah</button>
			</div>
			</form>
			
          </div>
      </div>
    </div>
    </form>
    {{-- end of modal edit --}}
@endsection
{{-- end of modal --}}

{{-- style : kalo butuh editing css --}}
@section('style')
  <style>
    .img-unitkerja {
      width: 100%;
      height: 220px;
    }
    .img-unitkerja img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      -o-object-fit: cover;
    }
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

{{-- script : kalo butu editing script --}}
@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
	<script>
		@if($errors->first('type') === 'update')
			$('#m-edit').modal('show');
			const ajax_url_error = `{{ route('ajax.unitKerjaById', $errors->first('unitkerjaId')) }}`;
			$.ajax({
				url: ajax_url_error,
				success: function(result) {
					$('#form-m-edit').attr('action', `{{ route('unitkerja.update') }}/${result.data.id}`);
					$('#img-unitkerja-edit').attr('src', '{{ asset("storage") }}/'+result.data.photo+'');
					$('#name-m-edit').val(result.data.name);
					$('#description-m-edit').html(result.data.description);
					$('#sumberdana-m-edit').selectpicker('val', result.data.sumberdana_id);

				},
				error: function(result){
					console.log(result);
    			}
			});
		@endif
		@if($errors->first('type') === 'store')
			$('#m-add-unitkerja').modal('show');
		@endif
		

		$('button[data-unitkerja-id]').on('click', function() {
			$('#m-edit .form-control').removeClass('is-invalid');
			$('#m-edit span[role="alert"]').html('');
			const ajax_url = `{{ route('ajax.unitKerjaById') }}/${$(this).data('unitkerja-id')}`;
			$.ajax({
				url: ajax_url,
				success: function(result) {
					$('#form-m-edit').attr('action', `{{ route('unitkerja.update') }}/${result.data.id}`);
					$('#img-unitkerja-edit').attr('src', '{{ asset("storage") }}/'+result.data.photo+'');
					$('#name-m-edit').val(result.data.name);
					$('#description-m-edit').html(result.data.description);
					$('#sumberdana-m-edit').selectpicker('val', result.data.sumberdana_id);

				},
				error: function(result){
					console.log(result);
    			}
			});

		})
	</script>
@endsection