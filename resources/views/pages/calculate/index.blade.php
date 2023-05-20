@extends('layouts.main')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card mb-3">
            <div class="card-header">
                Penentuan nilai
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th width="25%" scope="col">Alternatif/Kriteria</th>
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
                                <th> <a href="{{ route('calculate.edit', $alternative->id) }}"
                                        class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i> </a>
                                    {{ $alternative->code }}</th>
                                @foreach ($alternative->criterias as $criteria)
                                    <td>{{ $criteria->value }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex gap-2">
            <form action="{{ route('calculate.process') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-success">Hitung</button>
            </form>
            <form onclick="return confirm('hapus semua data?')" action="{{ route('calculate.clear') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Bersihkan data</button>
            </form>
        </div>
    </div>
@endsection
