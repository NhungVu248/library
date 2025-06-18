@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Sửa Thông Tin Thủ Thư</h2>

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
            <h4 class="mb-0">Sửa Thủ Thư</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('librarians.update', $librarian->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Ảnh Avatar -->
                <div class="form-group mb-3">
                    <label for="avatar" class="form-label">Ảnh Avatar</label>
                    <input type="file" name="avatar" id="avatar" accept="image/*" class="form-control">
                    @if($librarian->avatar)
                        <img src="{{ asset('storage/avatars/' . $librarian->avatar) }}" alt="Avatar của {{ $librarian->name }}" class="rounded-circle mt-2" style="width: 100px; height: 100px; object-fit: cover; border: 2px solid #007bff;">
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar mặc định" class="rounded-circle mt-2" style="width: 100px; height: 100px; object-fit: cover; border: 2px solid #007bff;">
                    @endif
                    @error('avatar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Tên -->
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Tên</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $librarian->name) }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $librarian->email) }}" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Số Điện Thoại -->
                <div class="form-group mb-3">
                    <label for="phone" class="form-label">Số Điện Thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $librarian->phone) }}" required>
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Cập Nhật</button>
                    <a href="{{ route('librarians.index') }}" class="btn btn-secondary">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection