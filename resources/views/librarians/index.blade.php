@extends('layout')

@section('content')
<!-- Full-width Banner Section -->
<div class="w-100 overflow-hidden">
    <img src="{{ asset('images/banner.jpg') }}" alt="Library Banner" class="img-fluid w-100" style="height: 300px; object-fit: cover;">
</div>

<!-- Main Content -->
<div class="container mt-5">
    <h2 class="mb-4">📚 Danh Sách Thủ Thư</h2>

    <!-- Search Form -->
    <form method="GET" action="{{ route('librarians.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="🔍 Tìm theo tên hoặc email...">
            <button type="submit" class="btn btn-outline-secondary">Tìm</button>
        </div>
    </form>

    <!-- Add Button -->
    <a href="{{ route('librarians.create') }}" class="btn btn-primary mb-4">➕ Thêm Thủ Thư</a>

    <!-- Success Message -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Card Layout (thay vì bảng) -->
    <div class="row">
        @forelse ($librarians as $librarian)
            <div class="col-md-4 mb-4">
                <div class="card librarian-card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <!-- Avatar Image -->
                        <div class="mb-3">
                            @if ($librarian->avatar)
                                <img src="{{ asset('storage/avatars/' . $librarian->avatar) }}" alt="Avatar của {{ $librarian->name }}" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar mặc định" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                            @endif
                        </div>
                        <h5 class="card-title">{{ $librarian->name }}</h5>
                        <p class="card-text">
                            <strong>Email:</strong> {{ $librarian->email }}<br>
                            <strong>Số điện thoại:</strong> {{ $librarian->phone }}
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('librarians.edit', $librarian->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('librarians.destroy', $librarian->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted text-center">Không tìm thấy thủ thư nào.</p>
        @endforelse
    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $librarians->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Custom Styles -->
<style>
    .librarian-card {
        transition: transform 0.2s, box-shadow 0.2s;
        border: none;
        border-radius: 10px;
    }

    .librarian-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        border: 1px solid #007bff;
    }

    .rounded-circle {
        border: 2px solid #007bff;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    .alert-dismissible .btn-close {
        padding: 0.75rem;
    }
</style>

@endsection