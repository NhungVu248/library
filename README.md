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
  ![image](https://github.com/user-attachments/assets/d7c2fc98-1fa5-43eb-9604-09ba363e5e93)
![image](https://github.com/user-attachments/assets/3aaee7f3-1fe7-4de6-867e-73c12c91258e)
![image](https://github.com/user-attachments/assets/270b65f8-6f64-4487-972d-ef90dda8470d)
![image](https://github.com/user-attachments/assets/a3683c76-7ffb-4773-805c-4d3952ac02cf)

- **Quản lý sách:** Index, Create, Store, Show, Edit, Update, Delete
  ![image](https://github.com/user-attachments/assets/563e588e-69a7-4860-a8e3-295441fe54f5)
![image](https://github.com/user-attachments/assets/4274b4f6-c23a-4835-a485-a96f407c9a82)
![image](https://github.com/user-attachments/assets/673a96ba-1011-4d40-b412-a631b782d430)
![image](https://github.com/user-attachments/assets/3ca416b4-9751-434b-8951-e84eaa1275c7)
![image](https://github.com/user-attachments/assets/21289c89-96eb-4d62-85cd-ba9db708ddbb)
![image](https://github.com/user-attachments/assets/8d38233f-48be-4517-99ad-2036d0615ae7)

- **Quản lý sinh viên:** Index, Create, Store, Edit, Update, Delete
- ![image](https://github.com/user-attachments/assets/917b0640-2c21-413a-9129-fa0fa5922312)
![image](https://github.com/user-attachments/assets/b36a6e75-2280-481c-8635-55d94d01be4a)
![image](https://github.com/user-attachments/assets/3c79915c-7391-43e8-96d5-a58067ef0eec)
![image](https://github.com/user-attachments/assets/58e340b6-af8f-4352-818f-9cc3f2b5736e)
![image](https://github.com/user-attachments/assets/c1ab8fbb-74f2-4457-9058-914137166317)

- **Quản lý thủ thư:** Như sinh viên, thêm log lỗi
- ![image](https://github.com/user-attachments/assets/b31f92de-3ee4-421b-90fe-60c13d42f996)
- ![image](https://github.com/user-attachments/assets/9f48446d-d5ad-41f3-a7d9-75945698d4dd)
![image](https://github.com/user-attachments/assets/7e42b5b1-0667-4b99-85dc-c4cb5e90dd87)
![image](https://github.com/user-attachments/assets/d47e7420-163a-47a1-9382-eedde8dee20f)

![image](https://github.com/user-attachments/assets/8b0a7b5c-2a53-40bb-bfc5-a434b4f00a05)

- **Quản lý mượn/trả:** Index, Create, Store, Show, Edit, Update, Delete
![image](https://github.com/user-attachments/assets/21561ee0-8d72-476e-a061-bb423dd287c7)
![image](https://github.com/user-attachments/assets/bdcf6969-bfc4-46a6-97f5-62d12d52f224)
![image](https://github.com/user-attachments/assets/cb098023-5efa-47db-b6ae-251577cca5f7)
![image](https://github.com/user-attachments/assets/780cdb77-cdb7-45d8-ad2f-61a46c62470a)
![image](https://github.com/user-attachments/assets/e9cd5a42-9593-4a21-a964-ea7f6a3b79e9)
![image](https://github.com/user-attachments/assets/908d6dd4-d854-40d3-a3e5-980aecd2d0c0)
![image](https://github.com/user-attachments/assets/67456d1c-2e4a-4c03-a9a0-831eadd471a8)

---

💻 Mã nguồn nổi bật
<details> <summary>ProfileController</summary>
PHP
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
Mọi đóng góp đều được hoan nghênh! Vui lòng fork, gửi pull request và đảm bảo code tuân thủ chuẩn, có kiểm thử.

🙌 Lời cảm ơn
Cảm ơn Đại học Phenikaa vì cơ hội thực hiện dự án.
Cảm ơn cộng đồng Laravel vì tài liệu và các gói hỗ trợ tuyệt vời.
