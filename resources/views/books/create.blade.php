@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Thêm Sách Mới</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="bookname">Tên Sách</label>
            <input type="text" name="bookname" class="form-control" value="{{ old('bookname') }}" required>
        </div>
        <div class="form-group">
            <label for="author">Tác Giả</label>
            <input type="text" name="author" class="form-control" value="{{ old('author') }}" required>
        </div>
        <div class="form-group">
            <label for="publisher">Nhà Xuất Bản</label>
            <input type="text" name="publisher" class="form-control" value="{{ old('publisher') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Mô Tả</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Ảnh Sách</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Lưu Sách</button>
    </form>
</div>
@endsection