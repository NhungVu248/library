<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Chỉnh Sửa Sách</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="bookname" class="form-label">Tên Sách:</label>
                        <input type="text" id="bookname" name="bookname" value="{{ old('bookname', $book->bookname) }}" class="form-control" placeholder="Nhập Tên Sách" required>
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Tác Giả:</label>
                        <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" class="form-control" placeholder="Nhập Tác Giả" required>
                    </div>

                    <div class="mb-3">
                        <label for="publisher" class="form-label">Nhà Xuất Bản:</label>
                        <input type="text" id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" class="form-control" placeholder="Nhập Nhà Xuất Bản" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô Tả:</label>
                        <textarea id="description" name="description" class="form-control" placeholder="Nhập Mô Tả" required>{{ old('description', $book->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Ảnh Sách:</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*">
                        @if ($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->bookname }}" width="100" class="mt-2">
                        @endif
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Cập Nhật Sách</button>
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>