@extends('layout')
@section('title', 'Tambah Kategori')
@section('content-title', 'Tambah Category')
@section('content')

            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3 col-md-4">
                    <label class="font-weight-bold">Category</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" rows="5" placeholder="Masukkan Category">{{ old('name') }}</input>
                    
                    <!-- error message untuk description -->
                    @error('name')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                <button type="reset" class="btn btn-md btn-warning">RESET</button>
            </form>

@endsection