@extends('layouts.app')

@section('content')
    <div class="container">
        <style>
            .btn-orange {
                background-color: orange;
                color: white; /* Ensure the text color is readable */
                border: none; /* Optional: Remove border for a cleaner look */
            }
        </style>

        <h1>Edit Kriteria</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kriteria.update', $kriterium->id) }}" method="POST">
            @csrf
            @method('PUT')

            @foreach ([
                ['flag', 'text', 'Flag'],
                ['nama_kriteria', 'text', 'Nama Kriteria'],
                ['bobot', 'text', 'Bobot']
            ] as [$name, $type, $label])
                <div class="mb-3">
                    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
                    <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $kriterium->$name) }}">
                </div>
            @endforeach

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <select class="form-control" id="keterangan" name="keterangan">
                    @foreach(['benefit', 'cost'] as $option)
                        <option value="{{ $option }}" {{ old('keterangan', $kriterium->keterangan) == $option ? 'selected' : '' }}>{{ ucfirst($option) }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-orange">Updatee</button>
        </form>
    </div>
@endsection
