@extends('layouts.main')

@section('content')
    <div class="container">
        @if (session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
		@endif
        <div class="card">
            <div class="card-header">
                Perhitungan
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th rowspan="2" scope="col">Alternative</th>
                            @foreach ($criterias as $criteria)
                                <th scope="col">
                                    {{ $criteria->code }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>


                            @foreach ($alternatives as $alternative)
                                <tr>
                                    <th> <a href="{{ route('calculate.edit', $alternative->id) }}">update </a> {{ $alternative->code }}</th>
                                    @foreach ($alternative->criterias as $criteria)
                                        <td>{{ $criteria->value }}</td>
                                    @endforeach
                                </tr>
                            @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
