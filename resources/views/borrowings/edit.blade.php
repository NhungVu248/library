@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Sửa Mượn Trả Sách</h2>

    <!-- Thông báo lỗi -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Sửa Mượn Trả</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Sinh viên -->
                <div class="form-group mb-3">
                    <label for="student_id" class="form-label">Sinh Viên</label>
                    <select name="student_id" id="student_id" class="form-control" required>
                        <option value="">Chọn sinh viên</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" {{ old('student_id', $borrowing->student_id) == $student->id ? 'selected' : '' }}>{{ $student->studentname }}</option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Thủ thư xử lý -->
                <div class="form-group mb-3">
                    <label for="librarian_id" class="form-label">Thủ Thư Xử Lý</label>
                    <select name="librarian_id" id="librarian_id" class="form-control">
                        <option value="">Chọn thủ thư (tùy chọn)</option>
                        @foreach ($librarians as $librarian)
                            <option value="{{ $librarian->id }}" {{ old('librarian_id', $borrowing->librarian_id) == $librarian->id ? 'selected' : '' }}>{{ $librarian->name }}</option>
                        @endforeach
                    </select>
                    @error('librarian_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Tên sách -->
                <div class="form-group mb-3">
                    <label for="bookname" class="form-label">Tên Sách</label>
                    <input type="text" name="bookname" id="bookname" class="form-control" value="{{ old('bookname', $borrowing->bookname) }}" required>
                    @error('bookname')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Ngày mượn -->
                <div class="form-group mb-3">
                    <label for="dateborrowed" class="form-label">Ngày Mượn</label>
                    <input type="date" name="dateborrowed" id="dateborrowed" class="form-control" value="{{ old('dateborrowed', $borrowing->dateborrowed) }}" required>
                    @error('dateborrowed')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Ngày trả -->
                <div class="form-group mb-3">
                    <label for="datereturn" class="form-label">Ngày Trả (nếu đã trả)</label>
                    <input type="date" name="datereturn" id="datereturn" class="form-control" value="{{ old('datereturn', $borrowing->datereturn) }}">
                    <small class="text-muted">Để trống nếu sách đang được mượn.</small>
                    @error('datereturn')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Cập Nhật</button>
                    <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection