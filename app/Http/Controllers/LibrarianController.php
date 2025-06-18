<?php

namespace App\Http\Controllers;

use App\Models\Librarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class LibrarianController extends Controller
{
    /**
     * Hiển thị danh sách thủ thư với phân trang và tìm kiếm.
     */
    public function index(Request $request)
    {
        $query = Librarian::query();

        // Xử lý tìm kiếm theo tên hoặc email
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $librarians = $query->paginate(6); // Phân trang, 6 thủ thư mỗi trang
        return view('librarians.index', compact('librarians'));
    }

    /**
     * Hiển thị form thêm thủ thư.
     */
    public function create()
    {
        return view('librarians.create');
    }

    /**
     * Lưu thủ thư mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:librarians,email',
            'phone' => 'required|string|max:15',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'phone']);

        // Xử lý ảnh avatar
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $avatar = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = basename($avatar);
        }

        Librarian::create($data);
        return redirect()->route('librarians.index')->with('success', 'Thêm thủ thư thành công.');
    }

    /**
     * Hiển thị chi tiết thủ thư (chưa sử dụng).
     */
    public function show(Librarian $librarian)
    {
        //
    }

    /**
     * Hiển thị form sửa thông tin thủ thư.
     */
    public function edit(Librarian $librarian)
    {
        return view('librarians.edit', compact('librarian'));
    }

    /**
     * Cập nhật thông tin thủ thư.
     */
    public function update(Request $request, Librarian $librarian)
    {
        try {
            // Kiểm tra dữ liệu gửi lên
            Log::info('Dữ liệu gửi lên:', $request->all());
            if ($request->hasFile('avatar')) {
                Log::info('File avatar:', [$request->file('avatar')->getClientOriginalName()]);
            }

            // Validation
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:librarians,email,' . $librarian->id,
                'phone' => 'required|string|max:15',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = $request->only(['name', 'email', 'phone']);

            // Xử lý ảnh avatar
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                // Xóa ảnh cũ nếu có
                if ($librarian->avatar) {
                    $deleted = Storage::disk('public')->delete('avatars/' . $librarian->avatar);
                    Log::info('Xóa ảnh cũ:', ['avatar' => $librarian->avatar, 'thành công' => $deleted]);
                }
                $avatar = $request->file('avatar')->store('avatars', 'public');
                $data['avatar'] = basename($avatar);
                Log::info('Ảnh mới:', ['avatar' => $data['avatar']]);
            }

            // Cập nhật thủ thư
            $librarian->update($data);
            Log::info('Dữ liệu sau cập nhật:', $librarian->toArray());

            return redirect()->route('librarians.index')->with('success', 'Cập nhật thủ thư thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi cập nhật thủ thư:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra khi cập nhật thủ thư: ' . $e->getMessage()]);
        }
    }

    /**
     * Xóa thủ thư.
     */
    public function destroy(Librarian $librarian)
    {
        try {
            // Xóa ảnh avatar nếu có
            if ($librarian->avatar) {
                $deleted = Storage::disk('public')->delete('avatars/' . $librarian->avatar);
                Log::info('Xóa ảnh avatar:', ['avatar' => $librarian->avatar, 'thành công' => $deleted]);
            }

            $librarian->delete();
            return redirect()->route('librarians.index')->with('success', 'Xóa thủ thư thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa thủ thư:', ['error' => $e->getMessage()]);
            return redirect()->route('librarians.index')->withErrors(['error' => 'Có lỗi xảy ra khi xóa thủ thư.']);
        }
    }
}