@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Thêm Thủ Thư</h2>

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

    <form action="{{ route('librarians.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="avatar">Ảnh Avatar</label>
            <input type="file" name="avatar" id="avatar" accept="image/*" class="form-control">
            @error('avatar')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="name">Tên</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="phone">Số Điện Thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
            @error('phone')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-success mt-3">Lưu</button>
        <a href="{{ route('librarians.index') }}" class="btn btn-secondary mt-3">Quay Lại</a>
    </form>
</div>
@endsection