@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Category Details</h2>
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back to List
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Name</h4>
                    <p>{{ $category->name }}</p>
                    
                    <h4>Background</h4>
                    <p>{{ $category->category_background }}</p>
                </div>
                <div class="col-md-6">
                    <h4>Created At</h4>
                    <p>{{ $category->created_at->format('M d, Y') }}</p>
                    
                    <h4>Updated At</h4>
                    <p>{{ $category->updated_at->format('M d, Y') }}</p>
                </div>
            </div>
            
            <div class="mt-4">
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-1"></i> Edit Category
                </a>
            </div>
        </div>
    </div>
@endsection