@extends('layout')
@section('title', 'Kategori')
@section('content-title', 'Kategori')
@section('content')
@if (session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="success-alert">
        Category berhasil dihapus
    </div>
@endif

@if (session('add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="add-alert">
        Category berhasil ditambahkan
    </div>
@endif

<script>
    setTimeout(() => {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.classList.remove('show'); // mulai fade out
            setTimeout(() => successAlert.remove(), 150); // hapus dari DOM setelah animasi
        }

        const addAlert = document.getElementById('add-alert');
        if (addAlert) {
            addAlert.classList.remove('show');
            setTimeout(() => addAlert.remove(), 150);
        }
    }, 3000);
</script>


<div class="col-md-8">
    <a class="btn btn-success mb-3" href="{{ route('category.create') }}">ADD DATA</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection