@extends('layouts.main')

@section('content')
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Edit Penilaian - {{ $alternative->code }}, {{ $alternative->name }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('calculate.update', $alternative->id) }}" method="POST">
                            @method('patch')
                            @csrf
                            @foreach ($criterias as $criteria)
                                <div class="mb-3">
                                    <label class="form-label">{{ $criteria->name }} - {{ $criteria->code }} <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control  @error('criteria.' . $criteria->id) is-invalid @enderror"
                                        name="criteria[{{ $criteria->id }}]">
                                    @if ($errors->has('criteria.' . $criteria->id))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $criteria->code }} is required</strong>
                                    </span>
                                    @endif

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
