@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        .green-bg {
            background-color: green;
            color: white; /* To make the text color white for better readability */
        }
        .btn-yellow {
            background-color: yellow;
            color: black;
            border: none; /* Optional: Remove border for a cleaner look */
        }
        .btn-orange {
            background-color: orange;
            color: white;
            border: none; /* Optional: Remove border for a cleaner look */
        }
    </style>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Kriteria</h1>
        <a href="{{ route('kriteria.create') }}" class="btn btn-success">Tambah</a>
    </div>
    
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th class="green-bg">Flag</th>
                <th class="green-bg">Nama Kriteria</th>
                <th class="green-bg">Bobot</th>
                <th class="green-bg">Keterangan</th>
                <th class="green-bg">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriterias as $kriterium)
            <tr>
                <td>{{ $kriterium->flag }}</td>
                <td>{{ $kriterium->nama_kriteria }}</td>
                <td>{{ $kriterium->bobot }}</td>
                <td>{{ $kriterium->keterangan }}</td>
                <td>
                    <a href="{{ route('kriteria.edit', $kriterium->id) }}" class="btn btn-yellow">Edit</a>
                    <form action="{{ route('kriteria.destroy', $kriterium->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-orange">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
