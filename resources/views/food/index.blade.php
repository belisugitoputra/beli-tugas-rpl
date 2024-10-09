<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">All Tipe</h4>
                    <a href="{{ route('category.index') }}" class="btn btn-light btn-sm">ALL Brand </a>
                </div>

                <div class="card-body">
                    <div class="mb-3 text-end">
                        <a href="{{ route('food.create') }}" class="btn btn-success">
                            <i class="bi bi-plus-circle"></i> Create New Stok
                        </a>
                    </div>

                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Gambar</th>
                                <th scope="col">Seri</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Brand</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($foods) > 0)
                            @foreach($foods as $food)
                            <tr>
                                <td><img src="{{ asset('image') }}/{{ $food->image }}" width="100" class="img-thumbnail" alt="{{ $food->name }}"></td>
                                <td>{{ $food->name }}</td>
                                <td>{{ Str::limit($food->description, 50) }}</td>
                                <td>{{ number_format($food->price, 2) }}</td>
                                <td>{{ $food->category->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('food.edit', [$food->id]) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('food.destroy', [$food->id]) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this STOK?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-center">Thank You</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection