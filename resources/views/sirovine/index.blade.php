@extends('layouts.app')

@section('title', 'Sirovine')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Sirovine</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('sirovine.create') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i> Nova sirovina
            </a>
        </div>
    </div>

    <div class="row">
        @foreach($sirovine as $sirovina)
        <div class="col-md-4 mb-3">
            <div class="card {{ $sirovina->kolicina <= $sirovina->minimalna_kolicina ? 'border-warning' : '' }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $sirovina->naziv }}</h5>
                    <p class="card-text">
                        Količina: <strong>{{ $sirovina->kolicina }} {{ $sirovina->jedinica_mere }}</strong><br>
                        Minimalno: {{ $sirovina->minimalna_kolicina }} {{ $sirovina->jedinica_mere }}
                    </p>
                    <a href="{{ route('sirovine.edit', $sirovina) }}" class="btn btn-sm btn-outline-primary">Izmeni</a>
                    <form action="{{ route('sirovine.destroy', $sirovina) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Da li ste sigurni?')">Obriši</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection