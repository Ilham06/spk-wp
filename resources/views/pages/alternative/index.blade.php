@extends('layouts.main')

{{-- @section('header')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
          </nav>
    </div>
@endsection --}}

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('alternative.create') }}" class="btn btn-success btn-sm mb-3">Tambah data</a>
        <div class="card">
            <div class="card-header">
                Data Alternatif
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th width="40%" scope="col">Catatan</th>
                            <th width="10%" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alternatives as $alternative)
                            <tr>
                                <td>{{$alternative->code}}</td>
                                <td>{{ $alternative->name }}</td>
                                <td>{{ $alternative->note }}</td>
                                <td>
                                    <a href="{{ route('alternative.edit', $alternative->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <form onclick="return confirm('hapus data?')" method="post" action="{{ route('alternative.destroy', $alternative->id) }}" class="d-inline">
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
