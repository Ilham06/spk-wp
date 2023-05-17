@extends('layouts.main')

@section('content')
<div class="container-xl">
	<div class="row row-cards">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					Edit Penilaian
				</div>
				<div class="card-body">
					<form action="{{ route('calculate.update', $alternative->id) }}" method="POST">
						@method('patch')
						@csrf
                        @foreach ($criterias as $criteria)
                        <div class="mb-3">
							<label class="form-label">{{ $criteria->name }} - {{ $criteria->code }} <span class="text-danger">*</span></label>
							<input type="text" class="form-control  @error('code') is-invalid @enderror" name="criteria[{{ $criteria->id }}]">
							@error('code')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
                        @endforeach

						<button type="submit" class="btn btn-success">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
