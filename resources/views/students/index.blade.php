@extends('layout')

@section('content')

<!-- Banner Section -->
<div style="width: 100%; overflow: hidden;">
    <img src="{{ asset('images/banner.jpg') }}" alt="Library Banner" style="width: 100%; height: auto; object-fit: cover;">
</div>

<!-- Main Content -->
<div class="container mt-5">
    <h2 class="mb-4">📚 Danh Sách Sinh Viên</h2>

    <!-- Search Form -->
    <form method="GET" action="{{ route('students.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="🔍 Tìm theo tên hoặc email...">
            <button type="submit" class="btn btn-outline-secondary">Tìm</button>
        </div>
    </form>

    <!-- Add Button -->
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-4">➕ Thêm Sinh Viên</a>

    <!-- Success Message -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <!-- Card Layout -->
    <div class="row">
        @forelse ($students as $student)
            <div class="col-md-4 mb-4">
                <div class="card student-card h-100 shadow-sm">
                    <div class="card-body">
                        <!-- Ảnh Avatar -->
                        <div class="text-center mb-3">
                            @if ($student->avatar)
                                <img src="{{ asset('storage/avatars/' . $student->avatar) }}" alt="Avatar của {{ $student->studentname }}" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar mặc định" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                            @endif
                        </div>
                        <h5 class="card-title">{{ $student->studentname }}</h5>
                        <p class="card-text">
                            <strong>Email:</strong> {{ $student->email }}<br>
                            <strong>Số điện thoại:</strong> {{ $student->phone }}
                        </p>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Không tìm thấy sinh viên nào.</p>
        @endforelse
    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $students->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Custom Styles -->
<style>
    .student-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .student-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        border: 1px solid #007bff;
    }

    .rounded-circle {
        border: 2px solid #007bff;
    }
</style>

@endsection