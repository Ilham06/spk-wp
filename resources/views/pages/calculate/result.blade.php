@extends('layouts.main')

@section('content')
    <div class="container mb-5 pb-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                Matrix perbandingan kriteria dan alternatif
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
                                <th>{{ $alternative->code }}</th>
                                @foreach ($alternative->criterias as $criteria)
                                    <td>{{ $criteria->value }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                Nilai W
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            @foreach ($complete_w as $key => $w)
                                <th>{{ $key }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($complete_w as $key => $w)
                                <td>{{ $w }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mb-1">

            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header">
                        Nilai S
                    </div>
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            @foreach ($complete_s as $key => $s)
                                <tr>
                                    <th width="50%">{{ $key }}</th>
                                    <td width="50%">{{ $s }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header">
                        Nilai V
                    </div>
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            @foreach ($complete_v as $key => $v)
                                <tr>
                                    <th width="50%">{{ $key }}</th>
                                    <td width="50%">{{ $v }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header">
                        Hasil akhir
                    </div>
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            @foreach ($result as $key => $r)
                                <tr>
                                    <th width="50%">{{ $key }}</th>
                                    <td width="50%">{{ $r }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-success mb-5">
            Dari perhitungan SPK dengan metode <span class="fw-medium">Weight Product</span> diatas, maka didapatkan nilai tertinggi oleh alternatif <span class="fw-medium">{{ $highest['alternativ']['name'] }} ({{ $highest['alternativ']['code'] }})</span> dengan nilai sebesar {{ $highest['value'] }}.
        </div>
    </div>
@endsection
