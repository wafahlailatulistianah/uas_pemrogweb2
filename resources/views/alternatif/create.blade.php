@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        .btn-yellow {
            background-color: yellow;
            color: black; /* Optional: To ensure the text color is readable */
            border: none; /* Optional: Remove border for a cleaner look */
        }
    </style>

    <h1>Tambah Data Alternatif</h1>
    <form action="{{ route('alternatif.store') }}" method="POST">
        @csrf
        @foreach (['merek', 'C1', 'C2', 'C3', 'C4', 'C5'] as $field)
        <div class="form-group">
            <label for="{{ $field }}">{{ ucfirst($field) }}</label>
            <input type="text" class="form-control" id="{{ $field }}" name="{{ $field }}" required>
        </div>
        @endforeach
        <button type="submit" class="btn btn-yellow">Simpan</button>
    </form>
</div>
@endsection
