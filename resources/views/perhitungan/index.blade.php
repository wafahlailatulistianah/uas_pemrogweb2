@extends('layouts.app')

@section('title', 'Hasil Perhitungan TOPSIS')

@section('content')
<div class="container">
    <h1>Perhitungan TOPSIS</h1>

    <h2>Pembagi</h2>
    <table class="table table-bordered table-striped table-success">
        <thead class="thead-dark">
            <tr>
                <th>Kriteria</th>
                <th>Pembagi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembagi as $criteria => $divider)
            <tr>
                <td>{{ $criteria }}</td>
                <td>{{ $divider }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Normalisasi</h2>
    <table class="table table-bordered table-striped table-success">
        <thead class="thead-dark">
            <tr>
                <th>Merek</th>
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
                <th>C4</th>
                <th>C5</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ternormalisasi as $id => $result)
            <tr>
                <td>{{ $alternatifs->find($id)->merek }}</td>
                <td>{{ $result['C1'] }}</td>
                <td>{{ $result['C2'] }}</td>
                <td>{{ $result['C3'] }}</td>
                <td>{{ $result['C4'] }}</td>
                <td>{{ $result['C5'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Normalisasi Terbobot</h2>
    <table class="table table-bordered table-striped table-success">
        <thead class="thead-dark">
            <tr>
                <th>Merek</th>
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
                <th>C4</th>
                <th>C5</th>
            </tr>
        </thead>
        <tbody>
            @foreach($terbobot as $id => $result)
            <tr>
                <td>{{ $alternatifs->find($id)->merek }}</td>
                <td>{{ $result['C1'] }}</td>
                <td>{{ $result['C2'] }}</td>
                <td>{{ $result['C3'] }}</td>
                <td>{{ $result['C4'] }}</td>
                <td>{{ $result['C5'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Solusi Ideal (A+ dan A-)</h2>
    <table class="table table-bordered table-striped table-success">
        <thead class="thead-dark">
            <tr>
                <th>Kriteria</th>
                <th>Solusi Ideal Positif (A+)</th>
                <th>Solusi Ideal Negatif (A-)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solusiIdealPositif as $criteria => $value)
            <tr>
                <td>{{ $criteria }}</td>
                <td>{{ $value }}</td>
                <td>{{ $solusiIdealNegatif[$criteria] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Jarak Solusi Ideal Positif (D+) dan Negatif (D-)</h2>
    <table class="table table-bordered table-striped table-success">
        <thead class="thead-dark">
            <tr>
                <th>Merek</th>
                <th>D+</th>
                <th>D-</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jarakPemisah as $id => $result)
            <tr>
                <td>{{ $alternatifs->find($id)->merek }}</td>
                <td>{{ $result['dPositif'] }}</td>
                <td>{{ $result['dNegatif'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Nilai Preferensi (V)</h2>
    <table class="table table-bordered table-striped table-success">
        <thead class="thead-dark">
            <tr>
                <th>Merek</th>
                <th>Nilai Preferensi (V)</th>
                <th>Peringkat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasilPeringkat as $result)
            <tr>
                <td>{{ $result['merek'] }}</td>
                <td>{{ $result['nilaiPreferensi'] }}</td>
                <td>{{ $result['peringkat'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
