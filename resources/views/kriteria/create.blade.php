@extends('layouts.app')

@section('content')
    <div class="container">
        <style>
            .btn-yellow {
                background-color: yellow;
                color: black; /* Ensure the text color is readable */
                border: none; /* Optional: Remove border for a cleaner look */
            }
        </style>

        <h1>Tambah Kriteria</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kriteria.store') }}" method="POST">
            @csrf

            @foreach ([
                ['flag', 'text', 'Flag'],
                ['nama_kriteria', 'text', 'Nama Kriteria'],
                ['bobot', 'text', 'Bobot']
            ] as [$name, $type, $label])
                <div class="mb-3">
                    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
                    <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}">
                </div>
            @endforeach

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <select class="form-control" id="keterangan" name="keterangan">
                    @foreach(['benefit', 'cost'] as $option)
                        <option value="{{ $option }}" {{ old('keterangan') == $option ? 'selected' : '' }}>{{ ucfirst($option) }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-yellow">Simpan</button>
        </form>
    </div>
@endsection
