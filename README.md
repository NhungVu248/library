# 🎉 Ứng dụng Quản lý Thư viện

## 🌟 Tổng quan về dự án
Dự án này là một **Hệ thống Quản lý Thư viện** dựa trên web, phát triển nhằm hỗ trợ quản lý sách, sinh viên, thủ thư và quy trình mượn/trả sách một cách dễ dàng, hiệu quả.

---

**👩‍💻 Tác giả:** Vũ Hồng Nhung  
**🎓 Mã sinh viên:** 23010221  
**🏫 Lớp:** K17_CNTT_3  
**📚 Môn học:** Thiết kế web nâng cao  
**🏢 Trường:** Đại học Phenikaa, Khoa Công nghệ Thông tin  
**🌐 Kho GitHub:** [library](https://github.com/NhungVu248/library.git)  
**🚀 Website demo:** [library-production-07c2.up.railway.app](https://library-production-07c2.up.railway.app)

---

## 📝 Mô tả dự án

- 📖 **Quản lý sách:** Thêm, chỉnh sửa, xóa, hiển thị danh sách sách.
- 👥 **Quản lý sinh viên:** Thêm, chỉnh sửa, xóa, tải ảnh đại diện.
- 🧑‍🏫 **Quản lý thủ thư:** Thêm, chỉnh sửa, xóa, tải ảnh đại diện, ghi log lỗi.
- 🔄 **Quản lý mượn/trả:** Tìm kiếm, lọc, thao tác CRUD hồ sơ mượn/trả.
- 🛡️ **Quản lý hồ sơ người dùng:** Cập nhật thông tin, xóa tài khoản, quản lý phiên đăng nhập.

---

## 🛠️ Công nghệ sử dụng

| Công nghệ           | Mô tả                                        |
|---------------------|----------------------------------------------|
| **Laravel 11+**     | Framework PHP mạnh mẽ theo kiến trúc MVC     |
| **Laravel Breeze**  | Gói xác thực nhẹ, tích hợp Blade/Inertia.js  |
| **Blade**           | Template engine tích hợp trong Laravel       |
| **MySQL (Railway)** | Cơ sở dữ liệu quan hệ                        |
| **GitHub Codespaces** | Môi trường phát triển/triển khai đám mây  |

---

## 🏗️ Kiến trúc hệ thống

### 1. 📊 Sơ đồ cơ sở dữ liệu
Cơ sở dữ liệu gồm các thực thể:  
- **Books:** Thông tin sách (tên, tác giả, nhà xuất bản, mô tả, ảnh bìa)
- **Students:** Thông tin sinh viên (tên, email, ảnh đại diện)
- **Librarians:** Thông tin thủ thư (tên, email, SĐT, ảnh đại diện)
- **Borrowings:** Hồ sơ mượn sách (ID sinh viên, ID thủ thư, tên sách, ngày mượn/trả)
- **Users:** Tài khoản (email, tên, mật khẩu)

![image](https://github.com/user-attachments/assets/43509231-1718-4a11-bb54-d40f4fac3078)  
*Hình 1: Sơ đồ cơ sở dữ liệu*

### 2. 📈 Sơ đồ chức năng

Các mô-đun chính:
- 📚 **Quản lý sách:** Hiển thị, thêm, chỉnh sửa, xóa, quản lý ảnh bìa, xác thực dữ liệu
- 👨‍🎓 **Quản lý sinh viên:** Hiển thị, thêm, chỉnh sửa, xóa, quản lý ảnh đại diện, tìm kiếm
- 🧑‍🏫 **Quản lý thủ thư:** Hiển thị, thêm, chỉnh sửa, xóa, quản lý ảnh đại diện, ghi log lỗi
- 🔄 **Quản lý mượn/trả:** Quản lý hồ sơ mượn/trả, tìm kiếm, lọc
- 🛡️ **Quản lý hồ sơ:** Cập nhật thông tin, xóa tài khoản, quản lý phiên

![image](https://github.com/user-attachments/assets/11b846cb-c8cd-4796-8717-1d05df2a8c4b)  
*Hình 2: Sơ đồ chức năng*

### 3. 🔧 Sơ đồ thuật toán
- **Quản lý người dùng:** Edit, Update, Delete
- **Quản lý sách:** Index, Create, Store, Show, Edit, Update, Delete
- **Quản lý sinh viên:** Index, Create, Store, Edit, Update, Delete
- **Quản lý thủ thư:** Như sinh viên, thêm log lỗi
- **Quản lý mượn/trả:** Index, Create, Store, Show, Edit, Update, Delete

---

## 💻 Mã nguồn nổi bật

<details>
<summary>ProfileController</summary>

```php
// Quản lý hồ sơ người dùng
namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function edit(Request $request) {
        return view('profile.edit', ['user' => $request->user()]);
    }
    public function update(ProfileUpdateRequest $request): RedirectResponse {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    public function destroy(Request $request): RedirectResponse {
        $request->validateWithBag('userDeletion', ['password' => ['required', 'current_password']]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');
    }
}
</details> <details> <summary>StudentController</summary>
PHP
// Quản lý thông tin sinh viên
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request) {
        $query = Student::query();
        if ($request->has('search')) {
            $query->where('studentname', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('email', 'LIKE', '%' . $request->search . '%');
        }
        $students = $query->paginate(6);
        return view('students.index', compact('students'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'studentname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('avatar')) {
            $validated['photo'] = $request->file('avatar')->store('avatars', 'public');
        }
        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Sinh viên được tạo thành công.');
    }
}
</details> <details> <summary>BorrowingController</summary>
PHP
// Quản lý hồ sơ mượn/trả
namespace App\Http\Controllers;
use App\Models\Borrowing;
use App\Models\Student;
use App\Models\Librarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BorrowingController extends Controller
{
    public function index(Request $request) {
        $query = Borrowing::with(['student', 'librarian']);
        if ($request->has('search')) {
            $query->whereHas('student', fn($q) => $q->where('studentname', 'LIKE', '%' . $request->search . '%'))
                  ->orWhere('bookname', 'LIKE', '%' . $request->search . '%');
        }
        $borrowings = $query->paginate(6);
        return view('borrowings.index', compact('borrowings'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'bookname' => 'required|string|max:255',
            'dateborrowed' => 'required|date',
        ]);
        $student = Student::find($request->student_id);
        $validated['studentname'] = $student->studentname;
        Borrowing::create($validated);
        return redirect()->route('borrowings.index')->with('success', 'Hồ sơ mượn được tạo thành công.');
    }
}
</details>
📦 Hướng dẫn cài đặt
bash
# 1. Tải mã nguồn
git clone https://github.com/NhungVu248/library.git
cd library

# 2. Cài đặt phụ thuộc
composer install
npm install

# 3. Thiết lập môi trường
cp .env.example .env

# 4. Cấu hình .env (MySQL)
php artisan key:generate

# 5. Chạy migration
php artisan migrate

# 6. Khởi động server
php artisan serve

# 7. Truy cập tại
http://localhost:8000

# 8. Biên dịch tài nguyên
npm run dev
🎮 Hướng dẫn sử dụng
🔐 Đăng nhập: Yêu cầu xác thực để truy cập.
📊 Bảng điều khiển: Quản lý sách, sinh viên, thủ thư, hồ sơ mượn/trả.
🛠️ Quản lý hồ sơ: Cập nhật hoặc xóa tài khoản.
🔍 Tìm kiếm & lọc: Tìm bản ghi nhanh chóng.
🤝 Đóng góp
