@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Chi Tiết Mượn Trả</h2>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Thông Tin Mượn Trả</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Thông tin sinh viên -->
                <div class="col-md-6">
                    <h5>Sinh Viên</h5>
                    <div class="d-flex align-items-center mb-3">
                        @if ($borrowing->student && $borrowing->student->avatar)
                            <img src="{{ asset('storage/avatars/' . $borrowing->student->avatar) }}" alt="Avatar của {{ $borrowing->studentname }}" class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid #007bff;">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar mặc định" class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid #007bff;">
                        @endif
                        <div>
                            <strong>Tên:</strong> {{ $borrowing->studentname }}<br>
                            <strong>Email:</strong> {{ $borrowing->student->email ?? 'N/A' }}<br>
                            <strong>Số điện thoại:</strong> {{ $borrowing->student->phone ?? 'N/A' }}
                        </div>
                    </div>
                </div>
                <!-- Thông tin sách -->
                <div class="col-md-6">
                    <h5>Sách</h5>
                    <p>
                        <strong>Tên sách:</strong> {{ $borrowing->bookname }}<br>
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
                </div>
                <!-- Thông tin thủ thư -->
                @if ($borrowing->librarian)
                    <div class="col-md-12 mt-4">
                        <h5>Thủ Thư Xử Lý</h5>
                        <div class="d-flex align-items-center">
                            @if ($borrowing->librarian->avatar)
                                <img src="{{ asset('storage/avatars/' . $borrowing->librarian->avatar) }}" alt="Avatar của {{ $borrowing->librarian->name }}" class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid #007bff;">
                            @else
                                <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar mặc định" class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid #007bff;">
                            @endif
                            <div>
                                <strong>Tên:</strong> {{ $borrowing->librarian->name }}<br>
                                <strong>Email:</strong> {{ $borrowing->librarian->email }}<br>
                                <strong>Số điện thoại:</strong> {{ $borrowing->librarian->phone }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="text-end mt-4">
                <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </div>
    </div>
</div>
@endsection