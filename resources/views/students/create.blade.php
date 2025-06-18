@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Thêm Sinh Viên</h2>

    <!-- Thông báo lỗi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="avatar">Ảnh Avatar</label>
            <input type="file" name="avatar" id="avatar" accept="image/*" class="form-control">
            @error('avatar')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="studentname">Tên Sinh Viên</label>
            <input type="text" name="studentname" id="studentname" class="form-control" value="{{ old('studentname') }}" required>
            @error('studentname')
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
        <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Quay Lại</a>
    </form>
</div>
@endsection