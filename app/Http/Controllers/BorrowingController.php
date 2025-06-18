<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Student;
use App\Models\Librarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BorrowingController extends Controller
{
    /**
     * Hiển thị danh sách mượn trả với phân trang và tìm kiếm.
     */
    public function index(Request $request)
    {
        $query = Borrowing::query()->with(['student', 'librarian']);

        // Xử lý tìm kiếm theo tên sinh viên hoặc tên sách
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('studentname', 'like', "%{$search}%")
                  ->orWhere('bookname', 'like', "%{$search}%");
            });
        }

        // Lọc theo trạng thái
        if ($request->has('status') && !empty($request->status)) {
            if ($request->status == 'borrowing') {
                $query->whereNull('datereturn');
            } elseif ($request->status == 'returned') {
                $query->whereNotNull('datereturn');
            }
        }

        // Lọc theo ngày mượn
        if ($request->has('dateborrowed_from') && !empty($request->dateborrowed_from)) {
            $query->whereDate('dateborrowed', '>=', $request->dateborrowed_from);
        }
        if ($request->has('dateborrowed_to') && !empty($request->dateborrowed_to)) {
            $query->whereDate('dateborrowed', '<=', $request->dateborrowed_to);
        }

        $borrowings = $query->paginate(6);
        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Hiển thị form thêm mượn trả.
     */
    public function create()
    {
        $students = Student::all();
        $librarians = Librarian::all(); // Để chọn thủ thư xử lý
        return view('borrowings.create', compact('students', 'librarians'));
    }

    /**
     * Lưu bản ghi mượn trả mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'librarian_id' => 'nullable|exists:librarians,id',
            'bookname' => 'required|string|max:255',
            'dateborrowed' => 'required|date',
            'datereturn' => 'nullable|date|after_or_equal:dateborrowed',
        ]);

        $data = $request->only(['student_id', 'librarian_id', 'bookname', 'dateborrowed', 'datereturn']);
        $student = Student::find($request->student_id);
        $data['studentname'] = $student->studentname;

        Borrowing::create($data);
        return redirect()->route('borrowings.index')->with('success', 'Thêm bản ghi mượn trả thành công.');
    }

    /**
     * Hiển thị chi tiết mượn trả.
     */
    public function show(Borrowing $borrowing)
    {
        $borrowing->load(['student', 'librarian']); // Tải quan hệ
        return view('borrowings.show', compact('borrowing'));
    }

    /**
     * Hiển thị form sửa thông tin mượn trả.
     */
    public function edit(Borrowing $borrowing)
    {
        $students = Student::all();
        $librarians = Librarian::all();
        return view('borrowings.edit', compact('borrowing', 'students', 'librarians'));
    }

    /**
     * Cập nhật thông tin mượn trả.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        try {
            $request->validate([
                'student_id' => 'required|exists:students,id',
                'librarian_id' => 'nullable|exists:librarians,id',
                'bookname' => 'required|string|max:255',
                'dateborrowed' => 'required|date',
                'datereturn' => 'nullable|date|after_or_equal:dateborrowed',
            ]);

            $data = $request->only(['student_id', 'librarian_id', 'bookname', 'dateborrowed', 'datereturn']);
            $student = Student::find($request->student_id);
            $data['studentname'] = $student->studentname;

            $borrowing->update($data);
            return redirect()->route('borrowings.index')->with('success', 'Cập nhật bản ghi mượn trả thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi cập nhật mượn trả:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra khi cập nhật: ' . $e->getMessage()]);
        }
    }

    /**
     * Xóa bản ghi mượn trả.
     */
    public function destroy(Borrowing $borrowing)
    {
        try {
            $borrowing->delete();
            return redirect()->route('borrowings.index')->with('success', 'Xóa bản ghi mượn trả thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa mượn trả:', ['error' => $e->getMessage()]);
            return redirect()->route('borrowings.index')->withErrors(['error' => 'Có lỗi xảy ra khi xóa.']);
        }
    }
}