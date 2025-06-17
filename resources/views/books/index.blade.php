@extends('layout')

@section('content')

<!-- Full-width banner OUTSIDE container -->
<div class="banner">
    </div>

<!-- Book List Section INSIDE container -->
<div class="book-list container">
    <h2 class="section-title">Danh Sách Sách</h2>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <div class="row justify-content-center">
        @forelse ($books as $book)
            <div class="col-md-3 mb-4">
                <div class="card book-card">
                    <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top book-image" alt="{{ $book->bookname }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->bookname }}</h5>
                        <p class="card-text"><strong>Tác Giả:</strong> {{ $book->author }}</p>
                        <p class="card-text"><strong>Nhà Xuất Bản:</strong> {{ $book->publisher }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-pastel-info">Xem Chi Tiết</a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-pastel-warning">Sửa</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-pastel-danger" onclick="return confirm('Bạn có chắc muốn xóa sách này?')">Xóa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Không có sách nào để hiển thị.</p>
        @endforelse
    </div>
    <a href="{{ route('books.create') }}" class="btn btn-pastel mt-3">Thêm Sách</a>
</div>
@endsection

<style>
    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        overflow-x: hidden;
    }
 .banner {
            background: url('{{ asset("images/banner.jpg") }}') no-repeat center center;
            background-size: contain;
            height: 400px; /* Increased height to show full image */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            position: relative;
            margin-bottom: 40px;
        }

    .book-list {
        padding: 40px 0;
        background-color: #f9f9f9;
        text-align: center;
    }

    .section-title {
        font-size: 2rem;
        margin-bottom: 20px;
        color: #333;
    }

    .book-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .book-card:hover {
        transform: translateY(-5px);
    }

    .book-image {
        width: 100%;
        object-fit: cover;
        max-height: 300px;
    }

    .btn-pastel,
    .btn-pastel-info,
    .btn-pastel-warning,
    .btn-pastel-danger {
        background-color: #A3D8F4;
        border: none;
        color: #fff;
    }

    .btn-pastel:hover,
    .btn-pastel-info:hover,
    .btn-pastel-warning:hover,
    .btn-pastel-danger:hover {
        background-color: #89CFF0;
    }
</style>
