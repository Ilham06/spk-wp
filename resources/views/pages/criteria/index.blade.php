@extends('layouts.main')

@section('content')
    <div class="container">
        <a href="{{ route('criteria.create') }}" class="btn btn-success btn-sm mb-3">Tambah Criteria</a>
        @if (session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
		@endif
        <div class="card">
            <div class="card-header">
                Data Criteria
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Attribute</th>
                            <th scope="col">Bobot</th>
                            <th width="10%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($criterias as $criteria)
                            <tr>
                                <td>{{$criteria->code}}</td>
                                <td>{{ $criteria->name }}</td>
                                <td>{{ $criteria->attribute }}</td>
                                <td>{{ $criteria->weight }}</td>
                                <td>
                                    <a href="{{ route('criteria.edit', $criteria->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form onclick="return confirm('hapus data?')" method="post" action="{{ route('criteria.destroy', $criteria->id) }}" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger btn-icon btn-inline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
