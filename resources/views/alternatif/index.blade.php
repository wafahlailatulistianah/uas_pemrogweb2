@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        .green-bg {
            background-color: green;
            color: white; /* Optional: To make the text color white for better readability */
        }
        .btn-yellow {
            background-color: yellow;
            color: black; /* Optional: To ensure the text color is readable */
            border: none; /* Optional: Remove border for a cleaner look */
        }
        .btn-orange {
            background-color: orange;
            color: white; /* Optional: To ensure the text color is readable */
            border: none; /* Optional: Remove border for a cleaner look */
        }
    </style>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Data Alternatif</h1>
        <a href="{{ route('alternatif.create') }}" class="btn btn-success">Tambah Alternatif</a>
    </div>
    
    <!-- Search Form -->
    <form method="GET" action="{{ route('alternatif.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-sm-2" placeholder="Cari alternatif..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Cari</button>
    </form>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                @foreach (['Merek', 'C1', 'C2', 'C3', 'C4', 'C5', 'Aksi'] as $header)
                <th class="green-bg">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs as $alternatif)
            <tr>
                <td>{{ $alternatif->merek }}</td>
                <td>{{ $alternatif->C1 }}</td>
                <td>{{ $alternatif->C2 }}</td>
                <td>{{ $alternatif->C3 }}</td>
                <td>{{ $alternatif->C4 }}</td>
                <td>{{ $alternatif->C5 }}</td>
                <td>
                    <a href="{{ route('alternatif.edit', $alternatif->id) }}" class="btn btn-yellow">Edit</a>
                    <form action="{{ route('alternatif.destroy', $alternatif->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-orange" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
