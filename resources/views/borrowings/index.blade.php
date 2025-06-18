@extends('layout')

@section('content')
<!-- Banner Section -->
<div class="w-100 mb-4 position-relative overflow-hidden">
    <img src="{{ asset('images/banner.jpg') }}" alt="Library Banner" class="img-fluid w-100" style="max-height: 300px; object-fit: cover;">
    <div class="position-absolute top-50 start-50 translate-middle text-white text-center" style="background: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
        <h1>Quản Lý Mượn Trả Sách</h1>
    </div>
</div>

<!-- Main Content -->
<div class="container mt-5">
    <h2 class="mb-4">📚 Danh Sách Mượn Trả</h2>

    <!-- Search and Filter Form -->
    <form method="GET" action="{{ route('borrowings.index') }}" class="mb-4">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="🔍 Tìm theo tên sinh viên hoặc sách...">
                    <button type="submit" class="btn btn-outline-secondary">Tìm</button>
                </div>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">Tất cả trạng thái</option>
                    <option value="borrowing" {{ request('status') == 'borrowing' ? 'selected' : '' }}>Đang mượn</option>
                    <option value="returned" {{ request('status') == 'returned' ? 'selected' : '' }}>Đã trả</option>
                </select>
            </div>
            <div class="col-md-5">
                <div class="input-group">
                    <input type="date" name="dateborrowed_from" value="{{ request('dateborrowed_from') }}" class="form-control" placeholder="Từ ngày mượn">
                    <input type="date" name="dateborrowed_to" value="{{ request('dateborrowed_to') }}" class="form-control" placeholder="Đến ngày mượn">
                    <button type="submit" class="btn btn-outline-secondary">Lọc</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Add Button -->
    <a href="{{ route('borrowings.create') }}" class="btn btn-primary mb-4">➕ Thêm Mượn Trả</a>

    <!-- Success Message -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Card Layout -->
    <div class="row">
        @forelse ($borrowings as $borrowing)
            <div class="col-md-4 mb-4">
                <div class="card borrowing-card h-100 shadow-sm">
                    <div class="card-body">
                        <!-- Avatar của sinh viên -->
                        @if ($borrowing->student && $borrowing->student->avatar)
                            <div class="text-center mb-3">
                                <img src="{{ asset('storage/avatars/' . $borrowing->student->avatar) }}" alt="Avatar của {{ $borrowing->studentname }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid #007bff;">
                            </div>
                        @else
                            <div class="text-center mb-3">
                                <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar mặc định" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid #007bff;">
                            </div>
                        @endif
                        <h5 class="card-title">{{ $borrowing->studentname }}</h5>
                        <p class="card-text">
                            <strong>Sách:</strong> {{ $borrowing->bookname }}<br>
                            <strong>Ngày mượn:</strong> {{ \Carbon\Carbon::parse($borrowing->dateborrowed)->format('d/m/Y') }}<br>
                            <strong>Ngày trả:</strong> {{ $borrowing->datereturn ? \Carbon\Carbon::parse($borrowing->datereturn)->format('d/m/Y') : 'Chưa trả' }}<br>
                            <strong>Trạng thái:</strong> 
                            @if (!$borrowing->datereturn)
                                @if (\Carbon\Carbon::parse($borrowing->dateborrowed)->addDays(14)->isPast())
                                    <span class="badge bg-danger">Quá hạn</span>
                                @else
                                    <span class="badge bg-warning">Đang mượn</span>
                                @endif
                            @else
                                <span class="badge bg-success">Đã trả</span>
                            @endif
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('borrowings.show', $borrowing->id) }}" class="btn btn-info btn-sm">Chi tiết</a>
                            <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted text-center">Không tìm thấy bản ghi mượn trả nào.</p>
        @endforelse
    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $borrowings->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Custom Styles -->
<style>
    .borrowing-card {
        transition: transform 0.2s, box-shadow 0.2s;
        border: none;
        border-radius: 10px;
    }

    .borrowing-card:hover {
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

    .badge {
        font-size: 0.9rem;
    }
</style>

@endsection