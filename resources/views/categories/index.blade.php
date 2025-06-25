@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="section-title">Categories Management</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            <i class="fas fa-plus me-1"></i> Add Category
        </button>
    </div>
    
    <div class="card">
        <div class="card-header">
            <i class="fas fa-list me-2"></i> Categories List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <!-- Table content -->
                </table>
            </div>
            <!-- Pagination -->
        </div>
    </div>
    
    @include('categories.create-modal')
@endsection

@section('scripts')
    <script>
        // Category management scripts
    </script>
@endsection