@extends('layouts.main')

@section('content')
<div class="container-xl">
	<div class="row row-cards">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					Form Data Kriteria
				</div>
				<div class="card-body">
					<form action="{{ route('criteria.store') }}" method="POST">
						@csrf
						<div class="mb-3">
							<label class="form-label">Kode Kriteria <span class="text-danger">*</span></label>
							<input type="text" class="form-control  @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}">
							@error('code')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Kriteria <span class="text-danger">*</span></label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
							@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="mb-3">
							<label class="form-label">Bobot <span class="text-danger">*</span></label>
							<input type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" {{ old('weight') }}>
							@error('weight')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="mb-3">
							<div class="form-label">Atribut <span class="text-danger">*</span></div>
							<select class="form-select @error('attribute') is-invalid @enderror" name="attribute">
								<option value="benefit">Benefit</option>
								<option value="cost">Cost</option>
							</select>
							@error('attribute')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<button type="submit" class="btn btn-success">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
