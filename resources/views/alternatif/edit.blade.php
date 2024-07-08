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

    <h2>Edit Data Alternatif</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
        @csrf
        @method('PUT')
        @foreach (['merek', 'C1', 'C2', 'C3', 'C4', 'C5'] as $field)
        <div class="form-group">
            <label for="{{ $field }}">{{ ucfirst($field) }}</label>
            <input type="{{ $field == 'merek' ? 'text' : 'number' }}" 
                   class="form-control" 
                   id="{{ $field }}" 
                   name="{{ $field }}" 
                   value="{{ old($field, $alternatif->$field) }}" 
                   required>
        </div>
        @endforeach
        <button type="submit" class="btn btn-orange">Updatee</button>
    </form>
</div>
@endsection
