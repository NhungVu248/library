🎉 Ứng dụng Quản lý Thư viện
🌟 Tổng quan về dự án
Dự án này là một Hệ thống Quản lý Thư viện dựa trên web, được phát triển để hỗ trợ quản lý sách, sinh viên, thủ thư và quy trình mượn/trả sách một cách hiệu quả. Hệ thống cho phép người dùng thực hiện các thao tác như thêm, chỉnh sửa, xóa sách, quản lý thông tin sinh viên và thủ thư, cũng như theo dõi hồ sơ mượn sách. Người dùng cần đăng nhập để sử dụng các chức năng.

👩‍💻 Tác giả: Vũ Hồng Nhung  
🎓 Mã sinh viên: 23010221  
🏫 Lớp: K17_CNTT_3  
📚 Môn học: Thiết kế web nâng cao  
🏢 Trường: Đại học Phenikaa, Khoa Công nghệ Thông tin  
🌐 Kho GitHub: https://github.com/NhungVu248/library.git  
🚀 Trang web công khai: library-production-07c2.up.railway.app


📝 Mô tả dự án
Hệ thống Quản lý Thư viện được thiết kế để:

📖 Quản lý sách: Thêm, chỉnh sửa, xóa và hiển thị danh sách sách.
👥 Quản lý sinh viên: Thêm, chỉnh sửa, xóa và tải ảnh đại diện.
🧑‍🏫 Quản lý thủ thư: Thêm, chỉnh sửa, xóa, tải ảnh đại diện và ghi log lỗi.
🔄 Quản lý mượn/trả: Tìm kiếm, lọc và thực hiện các thao tác CRUD cho hồ sơ mượn/trả.
🛡️ Quản lý hồ sơ người dùng: Cập nhật thông tin, xóa tài khoản và quản lý phiên đăng nhập.


🛠️ Công nghệ sử dụng

Dự án sử dụng các công nghệ hiện đại để đảm bảo hiệu suất và khả năng mở rộng:



Công nghệ
Mô tả



Laravel 11+
Framework PHP mạnh mẽ theo kiến trúc MVC.


Laravel Breeze
Gói xác thực nhẹ, tích hợp Blade và Inertia.js.


Blade
Công cụ tạo mẫu tích hợp trong Laravel.


MySQL (Railway)
Cơ sở dữ liệu quan hệ để lưu trữ dữ liệu.


GitHub Codespaces
Môi trường phát triển và triển khai đám mây.



🏗️ Kiến trúc hệ thống
1. 📊 Sơ đồ cơ sở dữ liệu
Cơ sở dữ liệu được thiết kế để hỗ trợ các thực thể chính:

Books: Lưu trữ thông tin sách (tên, tác giả, nhà xuất bản, mô tả, ảnh bìa).
Students: Lưu trữ thông tin sinh viên (tên, email, ảnh đại diện).
Librarians: Lưu trữ thông tin thủ thư (tên, email, số điện thoại, ảnh đại diện).
Borrowings: Theo dõi hồ sơ mượn sách (ID sinh viên, ID thủ thư, tên sách, ngày mượn, ngày trả).
Users: Quản lý thông tin tài khoản (email, tên, mật khẩu).
![image](https://github.com/user-attachments/assets/43509231-1718-4a11-bb54-d40f4fac3078)

Hình 1: Sơ đồ cơ sở dữ liệu của hệ thống.
2. 📈 Sơ đồ chức năng
Hệ thống bao gồm các mô-đun sau:

📚 Quản lý sách: Hiển thị, thêm, chỉnh sửa, xóa sách; quản lý ảnh bìa và xác thực dữ liệu.

👨‍🎓 Quản lý sinh viên: Hiển thị, thêm, chỉnh sửa, xóa; quản lý ảnh đại diện và tìm kiếm.

🧑‍🏫 Quản lý thủ thư: Hiển thị, thêm, chỉnh sửa, xóa; quản lý ảnh đại diện và ghi log lỗi.

🔄 Quản lý mượn/trả: Quản lý hồ sơ mượn/trả, tìm kiếm, lọc theo trạng thái hoặc ngày.

🛡️ Quản lý hồ sơ người dùng: Cập nhật thông tin, xóa tài khoản, quản lý phiên.
![image](https://github.com/user-attachments/assets/11b846cb-c8cd-4796-8717-1d05df2a8c4b)

Hình 2: Sơ đồ chức năng của hệ thống.
3. 🔧 Sơ đồ thuật toán

Quản lý người dùng: Edit (hiển thị giao diện chỉnh sửa), Update (cập nhật thông tin), Delete (xóa tài khoản).
Quản lý sách: Index (hiển thị danh sách), Create (thêm mới), Store (lưu dữ liệu), Show (chi tiết), Edit (chỉnh sửa), Update (cập nhật), Delete (xóa).
Quản lý sinh viên: Index (danh sách), Create (thêm), Store (lưu), Edit (chỉnh sửa), Update (cập nhật), Delete (xóa).
Quản lý thủ thư: Tương tự sinh viên, thêm log lỗi.
Quản lý mượn/trả: Index (danh sách), Create (thêm), Store (lưu), Show (chi tiết), Edit (chỉnh sửa), Update (cập nhật), Delete (xóa).


💻 Mã nguồn nổi bật
1. ProfileController
Quản lý hồ sơ người dùng.
namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit', ['user' => $request->user()]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', ['password' => ['required', 'current_password']]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');
    }
}

2. StudentController
Quản lý thông tin sinh viên.
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();
        if ($request->has('search')) {
            $query->where('studentname', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('email', 'LIKE', '%' . $request->search . '%');
        }
        $students = $query->paginate(6);
        return view('students.index', compact('students'));
    }

    public function store(Request $request)
    {
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

3. BorrowingController
Quản lý hồ sơ mượn/trả.
namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Student;
use App\Models\Librarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BorrowingController extends Controller
{
    public function index(Request $request)
    {
        $query = Borrowing::with(['student', 'librarian']);
        if ($request->has('search')) {
            $query->whereHas('student', fn($q) => $q->where('studentname', 'LIKE', '%' . $request->search . '%'))
                  ->orWhere('bookname', 'LIKE', '%' . $request->search . '%');
        }
        $borrowings = $query->paginate(6);
        return view('borrowings.index', compact('borrowings'));
    }

    public function store(Request $request)
    {
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


📦 Hướng dẫn cài đặt

Tải mã nguồn:git clone https://github.com/NhungVu248/library.git
cd library


Cài đặt phụ thuộc:composer install
npm install


Thiết lập môi trường:
Sao chép .env.example thành .env:cp .env.example .env


Cấu hình .env với thông tin MySQL.
Tạo khóa:php artisan key:generate




Chạy migration:php artisan migrate


Khởi động server:php artisan serve

Truy cập tại http://localhost:8000.
Biên dịch tài nguyên:npm run dev




🎮 Hướng dẫn sử dụng

🔐 Đăng nhập: Yêu cầu xác thực để truy cập.
📊 Bảng điều khiển: Quản lý sách, sinh viên, thủ thư và hồ sơ mượn/trả.
🛠️ Quản lý hồ sơ: Cập nhật thông tin hoặc xóa tài khoản.
🔍 Tìm kiếm & lọc: Tìm bản ghi nhanh chóng.


🤝 Đóng góp
Mọi đóng góp đều được hoan nghênh! Fork kho mã nguồn và gửi pull request. Đảm bảo mã tuân thủ chuẩn code và có bài kiểm tra.

📜 Giấy phép
Dự án này là mã nguồn mở, cấp phép theo MIT License.

🙌 Lời cảm ơn

Cảm ơn Đại học Phenikaa vì cơ hội thực hiện dự án.
Cảm ơn cộng đồng Laravel vì tài liệu và gói hỗ trợ tuyệt vời.
