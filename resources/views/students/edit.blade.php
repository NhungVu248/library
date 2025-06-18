<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sinh Viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Sửa Thông Tin Sinh Viên</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Ảnh Avatar -->
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Ảnh Avatar</label>
                        <input type="file" name="avatar" id="avatar" accept="image/*" class="form-control">
                        @if ($errors->has('avatar'))
                            <div class="text-danger">{{ $errors->first('avatar') }}</div>
                        @endif
                        @if ($student->avatar)
                            <img src="{{ asset('storage/avatars/' . $student->avatar) }}" alt="Avatar của {{ $student->studentname }}" class="rounded-circle mt-2" style="width: 100px; height: 100px; object-fit: cover; border: 2px solid #007bff;">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar mặc định" class="rounded-circle mt-2" style="width: 100px; height: 100px; object-fit: cover; border: 2px solid #007bff;">
                        @endif
                    </div>

                    <!-- Tên Sinh Viên -->
                    <div class="mb-3">
                        <label for="studentname" class="form-label">Tên Sinh Viên:</label>
                        <input type="text" id="studentname" name="studentname" value="{{ old('studentname', $student->studentname) }}" class="form-control" placeholder="Nhập tên sinh viên" required>
                        @if ($errors->has('studentname'))
                            <div class="text-danger">{{ $errors->first('studentname') }}</div>
                        @endif
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}" class="form-control" placeholder="Nhập email" required>
                        @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <!-- Số Điện Thoại -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số Điện Thoại:</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $student->phone) }}" class="form-control" placeholder="Nhập số điện thoại" required>
                        @if ($errors->has('phone'))
                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>

                    <!-- Nút Hành Động -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Cập Nhật</button>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Hủy</a>
                    </div>
                </form>