<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Hiển thị danh sách sinh viên với phân trang và tìm kiếm.
     */
    public function index(Request $request)
    {
        $query = Student::query();

        // Xử lý tìm kiếm theo tên hoặc email
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('studentname', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $students = $query->paginate(6); // Phân trang, 6 sinh viên mỗi trang
        return view('students.index', compact('students'));
    }

    /**
     * Hiển thị form thêm sinh viên.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Lưu sinh viên mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'studentname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:15',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ảnh tối đa 2MB
        ]);

        $data = $request->only(['studentname', 'email', 'phone']);

        // Xử lý ảnh avatar
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = basename($avatar);
        }

        Student::create($data);
        return redirect()->route('students.index')->with('success', 'Thêm sinh viên thành công.');
    }

    /**
     * Hiển thị chi tiết sinh viên (chưa sử dụng).
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Hiển thị form sửa thông tin sinh viên.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Cập nhật thông tin sinh viên.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'studentname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|string|max:15',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['studentname', 'email', 'phone']);

        // Xử lý ảnh avatar
        if ($request->hasFile('avatar')) {
            // Xóa ảnh cũ nếu có
            if ($student->avatar) {
                Storage::disk('public')->delete('avatars/' . $student->avatar);
            }
            $avatar = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = basename($avatar);
        }

        $student->update($data);
        return redirect()->route('students.index')->with('success', 'Cập nhật sinh viên thành công.');
    }

    /**
     * Xóa sinh viên.
     */
    public function destroy(Student $student)
    {
        // Xóa ảnh avatar nếu có
        if ($student->avatar) {
            Storage::disk('public')->delete('avatars/' . $student->avatar);
        }

        $student->delete();
        return redirect()->route('students.index')->with('success', 'Xóa sinh viên thành công.');
    }
}