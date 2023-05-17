@extends('layouts.main')

@section('content')
    <div class="container">
        <a href="{{ route('alternative.create') }}" class="btn btn-success btn-sm mb-3">Add Alternative</a>
        <div class="card">
            <div class="card-header">
                Data Alternatif
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th width="40%" scope="col">Note</th>
                            <th width="10%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alternatives as $alternative)
                            <tr>
                                <td>{{$alternative->code}}</td>
                                <td>{{ $alternative->name }}</td>
                                <td>{{ $alternative->note }}</td>
                                <td>
                                    <a href="{{ route('alternative.edit', $alternative->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form onclick="return confirm('hapus data?')" method="post" action="{{ route('alternative.destroy', $alternative->id) }}" class="d-inline">
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
