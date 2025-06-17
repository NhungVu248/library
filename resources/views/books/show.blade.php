@extends('layout')

@section('content')
<div class="container my-5">
    <a href="{{ route('books.index') }}" class="text-decoration-none mb-3 d-inline-block">
        ← Quay lại danh sách
    </a>

    <div class="row align-items-start bg-light rounded shadow p-4">
        <!-- Bìa sách -->
        <div class="col-md-4 text-center">
            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->bookname }}"
                 class="img-fluid rounded shadow-sm" style="max-height: 450px; object-fit: cover;">
        </div>

        <!-- Thông tin sách -->
        <div class="col-md-8">
            <h2 class="fw-bold">{{ $book->bookname }}</h2>
            <p class="text-muted mb-2"><strong>Tác Giả:</strong> {{ $book->author }}</p>
            <p class="text-muted mb-2"><strong>Nhà Xuất Bản:</strong> {{ $book->publisher }}</p>

            <hr>

            <p style="line-height: 1.7">{{ $book->description }}</p>

            <a href="{{ route('books.index') }}" class="btn btn-primary mt-3">Quay Lại</a>
        </div>
    </div>
</div>
@endsection

<style>
    h2.fw-bold {
        font-size: 1.8rem;
        color: #333;
    }

    .text-muted {
        font-size: 1rem;
        color: #666;
    }

    .btn-primary {
        background-color: #6A5ACD;
        border: none;
    }

    .btn-primary:hover {
        background-color: #5A4BB7;
    }

    .shadow {
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
    }
</style>
