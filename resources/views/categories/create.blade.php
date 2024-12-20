{{-- resources/views/categories/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
<div class="container mt-4">
    <h1 class="text-light">Create Category</h1>
    <a href="{{ route('categories.index') }}" class="btn btn-outline-light mb-3">
        <i class="fas fa-arrow-left"></i> Back
    </a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST" class="bg-dark p-4 text-light rounded shadow-sm">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control bg-secondary text-white">
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control bg-secondary text-white">
        </div>
        <button type="submit" class="btn btn-outline-light">
            <i class="fas fa-save"></i> Submit
        </button>
    </form>
</div>
@endsection
