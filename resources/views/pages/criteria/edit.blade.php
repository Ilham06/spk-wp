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
					<form action="{{ route('criteria.update', $criteria->id) }}" method="POST">
						@method('patch')
						@csrf
						<div class="mb-3">
							<label class="form-label">Kode Kriteria <span class="text-danger">*</span></label>
							<input type="text" class="form-control  @error('code') is-invalid @enderror" name="code" value="{{ old('code', $criteria->code) }}">
							@error('code')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Kriteria <span class="text-danger">*</span></label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $criteria->name) }}">
							@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="mb-3">
							<label class="form-label">Bobot <span class="text-danger">*</span></label>
							<input type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight', $criteria->weight) }}">
							@error('weight')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="mb-3">
							<div class="form-label">Atribut <span class="text-danger">*</span></div>
							<select class="form-select @error('attribute') is-invalid @enderror" name="attribute">
								<option @if ($criteria->attribute == 'benefit') selected @endif value="benefit">Benefit</option>
								<option @if ($criteria->attribute == 'cost') selected @endif value="cost">Cost</option>
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
