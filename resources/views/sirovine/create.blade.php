@extends('layouts.app')

@section('title', 'Dodaj sirovinu')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Dodaj novu sirovinu</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('sirovine.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="naziv" class="form-label">Naziv sirovine</label>
                    <input type="text" class="form-control @error('naziv') is-invalid @enderror" 
                           id="naziv" name="naziv" value="{{ old('naziv') }}" required>
                    @error('naziv')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="kolicina" class="form-label">Količina</label>
                        <input type="number" step="0.01" class="form-control @error('kolicina') is-invalid @enderror" 
                               id="kolicina" name="kolicina" value="{{ old('kolicina', 0) }}" required>
                        @error('kolicina')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="jedinica_mere" class="form-label">Jedinica mere</label>
                        <select class="form-control @error('jedinica_mere') is-invalid @enderror" 
                                id="jedinica_mere" name="jedinica_mere" required>
                            <option value="kg">kg</option>
                            <option value="g">g</option>
                            <option value="l">l</option>
                            <option value="ml">ml</option>
                            <option value="kom">kom</option>
                        </select>
                        @error('jedinica_mere')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="minimalna_kolicina" class="form-label">Minimalna količina (za upozorenje)</label>
                    <input type="number" step="0.01" class="form-control @error('minimalna_kolicina') is-invalid @enderror" 
                           id="minimalna_kolicina" name="minimalna_kolicina" value="{{ old('minimalna_kolicina', 5) }}" required>
                    @error('minimalna_kolicina')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="napomena" class="form-label">Napomena (opciono)</label>
                    <textarea class="form-control @error('napomena') is-invalid @enderror" 
                              id="napomena" name="napomena" rows="3">{{ old('napomena') }}</textarea>
                    @error('napomena')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Sačuvaj</button>
                    <a href="{{ route('sirovine.index') }}" class="btn btn-secondary">Otkaži</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection