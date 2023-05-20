@extends('layouts.main')

@section('content')
    <div class="container">
        <a href="{{ route('criteria.create') }}" class="btn btn-success btn-sm mb-3">Tambah data</a>
        @if (session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
		@endif
        <div class="card">
            <div class="card-header">
                Data Kriteria
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Atribut</th>
                            <th scope="col">Bobot</th>
                            <th width="10%" scope="col">Aksi</th>
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
                                    <a href="{{ route('criteria.edit', $criteria->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <form onclick="return confirm('hapus data?')" method="post" action="{{ route('criteria.destroy', $criteria->id) }}" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger btn-icon btn-inline"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
