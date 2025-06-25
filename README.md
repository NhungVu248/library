Ứng dụng Quản lý Thư viện
Tổng quan về dự án
Dự án này là một Hệ thống Quản lý Thư viện dựa trên web, được phát triển để hỗ trợ quản lý sách, sinh viên, thủ thư và quy trình mượn/trả sách một cách hiệu quả. Hệ thống cho phép người dùng thực hiện các thao tác như thêm, chỉnh sửa, xóa sách, quản lý thông tin sinh viên và thủ thư, cũng như theo dõi hồ sơ mượn sách. Người dùng cần đăng nhập để sử dụng các chức năng.

Tác giả: Vũ Hồng Nhung  
Mã sinh viên: 23010221  
Lớp: K17_CNTT_3  
Môn học: Thiết kế web nâng cao  
Trường: Đại học Phenikaa, Khoa Công nghệ Thông tin  
Kho GitHub: https://github.com/NhungVu248/library.git  
Trang web công khai: library-production-07c2.up.railway.app

Mô tả dự án
Hệ thống Quản lý Thư viện được thiết kế để:

Quản lý sách trong thư viện (thêm, chỉnh sửa, xóa và hiển thị danh sách sách).
Quản lý thông tin sinh viên (thêm, chỉnh sửa, xóa và tải ảnh đại diện).
Quản lý thông tin thủ thư (thêm, chỉnh sửa, xóa, tải ảnh đại diện và ghi log lỗi).
Theo dõi quá trình mượn/trả sách (tìm kiếm, lọc và thực hiện các thao tác CRUD).
Cho phép người dùng quản lý hồ sơ cá nhân (cập nhật thông tin, xóa tài khoản và quản lý phiên đăng nhập).

Công nghệ sử dụng
Dự án sử dụng các công nghệ phát triển web hiện đại để đảm bảo hiệu suất và khả năng mở rộng:



Công nghệ
Mô tả



Laravel 11+
Framework PHP mạnh mẽ theo kiến trúc MVC.


Laravel Breeze
Gói xác thực nhẹ, tích hợp với Blade và Inertia.js.


Blade
Công cụ tạo mẫu tích hợp trong Laravel để render giao diện.


MySQL (Railway)
Cơ sở dữ liệu quan hệ để lưu trữ dữ liệu dự án.


GitHub Codespaces
Môi trường phát triển và triển khai dựa trên đám mây của GitHub.


Kiến trúc hệ thống
1. Sơ đồ cơ sở dữ liệu
   
Cơ sở dữ liệu được thiết kế để hỗ trợ các thực thể chính của hệ thống:

Books: Lưu trữ thông tin sách (tên sách, tác giả, nhà xuất bản, mô tả, ảnh bìa).
Students: Lưu trữ thông tin sinh viên (tên, email, ảnh đại diện).  
Librarians: Lưu trữ thông tin thủ thư (tên, email, số điện thoại, ảnh đại diện).  
Borrowings: Theo dõi hồ sơ mượn sách (ID sinh viên, ID thủ thư, tên sách, ngày mượn, ngày trả).  
Users: Quản lý thông tin tài khoản người dùng (email, tên, mật khẩu).
wnc.png
Hình 1: Sơ đồ cơ sở dữ liệu của hệ thống.
2. Sơ đồ chức năng
Hệ thống bao gồm các mô-đun sau:

Quản lý sách:

Hiển thị danh sách, thêm, chỉnh sửa và xóa sách.
Quản lý tải lên và lưu trữ ảnh bìa sách.
Xác thực dữ liệu đầu vào (tên sách, tác giả, nhà xuất bản, mô tả, ảnh).


Quản lý sinh viên:

Hiển thị danh sách, thêm, chỉnh sửa và xóa sinh viên.
Quản lý tải lên ảnh đại diện.
Tìm kiếm theo tên hoặc email, xác thực dữ liệu đầu vào.


Quản lý thủ thư:

Hiển thị danh sách, thêm, chỉnh sửa và xóa thủ thư.
Quản lý tải lên ảnh đại diện.
Tìm kiếm theo tên hoặc email, ghi log lỗi khi cập nhật/xóa.


Quản lý mượn/trả sách:

Quản lý hồ sơ mượn/trả sách.
Hiển thị danh sách, hỗ trợ tìm kiếm và lọc theo trạng thái (đang mượn/đã trả) hoặc ngày mượn.
Thêm, chỉnh sửa, xóa hồ sơ mượn/trả.


Quản lý hồ sơ người dùng:

Hiển thị và cập nhật thông tin hồ sơ (email, tên, v.v.).
Xóa tài khoản sau khi xác thực mật khẩu.
Quản lý phiên đăng nhập.


Editor _ Mermaid Chart-2025-06-18-173631.png
Hình 2: Sơ đồ chức năng của hệ thống.
3. Sơ đồ thuật toán

Quản lý người dùng:

Edit: Hiển thị giao diện chỉnh sửa hồ sơ với thông tin người dùng hiện tại.
Update: Xác thực dữ liệu, cập nhật thông tin, đặt lại trạng thái xác minh email nếu email thay đổi, chuyển hướng về giao diện chỉnh sửa.
Delete: Xác thực mật khẩu, đăng xuất, xóa tài khoản, làm mới phiên và chuyển hướng về trang chủ.


Quản lý sách:

Index: Truy vấn tất cả sách bằng Book::all() và hiển thị trong giao diện danh sách sách.
Create: Hiển thị giao diện thêm sách mới.
Store: Xác thực dữ liệu, tạo sách mới, xử lý tải ảnh bìa, lưu vào cơ sở dữ liệu và chuyển hướng về danh sách.
Show: Hiển thị chi tiết thông tin sách.
Edit: Hiển thị giao diện chỉnh sửa sách với dữ liệu hiện tại.
Update: Xác thực dữ liệu, cập nhật thông tin sách, xử lý ảnh bìa mới (xóa ảnh cũ nếu có), lưu và chuyển hướng.
Delete: Xóa sách và ảnh bìa liên quan, chuyển hướng về danh sách.


Quản lý sinh viên:

Index: Tìm kiếm theo tên hoặc email, phân trang (6 bản ghi/trang), hiển thị trong giao diện danh sách sinh viên.
Create: Hiển thị giao diện thêm sinh viên.
Store: Xác thực và lưu thông tin sinh viên, xử lý ảnh đại diện, chuyển hướng.
Edit: Hiển thị giao diện chỉnh sửa sinh viên.
Update: Xác thực, cập nhật thông tin, xử lý ảnh đại diện mới, chuyển hướng.
Delete: Xóa sinh viên và ảnh đại diện, chuyển hướng.


Quản lý thủ thư:

Tương tự quản lý sinh viên, bổ sung ghi log lỗi cho các thao tác cập nhật/xóa.
Show: Chưa được triển khai.


Quản lý mượn/trả sách:

Index: Truy vấn hồ sơ mượn với quan hệ sinh viên và thủ thư, hỗ trợ tìm kiếm theo tên sinh viên/sách, lọc theo trạng thái hoặc ngày mượn, phân trang (6 bản ghi/trang).
Create: Hiển thị giao diện thêm hồ sơ mượn với danh sách sinh viên và thủ thư. Độ phức tạp: O(n + m), với n và m là số lượng sinh viên và thủ thư.
Store: Xác thực dữ liệu, lấy tên sinh viên, tạo hồ sơ mượn, chuyển hướng.
Show: Hiển thị chi tiết hồ sơ mượn với thông tin sinh viên và thủ thư.
Edit: Hiển thị giao diện chỉnh sửa hồ sơ mượn.
Update: Xác thực, cập nhật hồ sơ, ghi log lỗi nếu có, chuyển hướng.
Delete: Xóa hồ sơ mượn, ghi log lỗi, chuyển hướng.



Mã nguồn nổi bật
Dưới đây là các đoạn mã chính từ các controller, thể hiện các chức năng cốt lõi.
1. ProfileController
Quản lý hồ sơ người dùng, bao gồm chỉnh sửa, cập nhật và xóa tài khoản.
namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Hiển thị giao diện chỉnh sửa hồ sơ người dùng.
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Cập nhật thông tin hồ sơ người dùng.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Xóa tài khoản người dùng.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

2. StudentController
Quản lý thông tin sinh viên với các thao tác CRUD và xử lý ảnh đại diện.
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Hiển thị danh sách sinh viên.
     */
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

    /**
     * Hiển thị giao diện thêm sinh viên.
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

    /**
     * Hiển thị giao diện chỉnh sửa sinh viên.
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
        $validated = $request->validate([
            'studentname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }
            $validated['photo'] = $request->file('avatar')->store('avatars', 'public');
        }

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Sinh viên được cập nhật thành công.');
    }

    /**
     * Xóa sinh viên khỏi cơ sở dữ liệu.
     */
    public function destroy(Student $student)
    {
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Sinh viên đã được xóa thành công.');
    }
}

3. BorrowingController
Quản lý hồ sơ mượn/trả sách với tìm kiếm, lọc và các thao tác CRUD.
namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Student;
use App\Models\Librarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BorrowingController extends Controller
{
    /**
     * Hiển thị danh sách hồ sơ mượn/trả.
     */
    public function index(Request $request)
    {
        $query = Borrowing::with(['student', 'librarian']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('student', function ($q) use ($search) {
                $q->where('studentname', 'LIKE', '%' . $search . '%');
            })->orWhere('bookname', 'LIKE', '%' . $search . '%');
        }

        if ($request->has('status')) {
            if ($request->status == 'borrowing') {
                $query->whereNull('datereturn');
            } elseif ($request->status == 'returned') {
                $query->whereNotNull('datereturn');
            }
        }

        if ($request->has(['dateborrowed_from', 'dateborrowed_to'])) {
            $query->whereBetween('dateborrowed', [$request->dateborrowed_from, $request->dateborrowed_to]);
        }

        $borrowings = $query->paginate(6);

        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Hiển thị giao diện tạo hồ sơ mượn mới.
     */
    public function create()
    {
        $students = Student::all();
        $librarians = Librarian::all();
        return view('borrowings.create', compact('students', 'librarians'));
    }

    /**
     * Lưu hồ sơ mượn mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'librarian_id' => 'required|exists:librarians,id',
            'bookname' => 'required|string|max:255',
            'dateborrowed' => 'required|date',
            'datereturn' => 'nullable|date|after_or_equal:dateborrowed',
        ]);

        $student = Student::find($request->student_id);
        $validated['studentname'] = $student->studentname;

        Borrowing::create($validated);

        return redirect()->route('borrowings.index')->with('success', 'Hồ sơ mượn được tạo thành công.');
    }

    /**
     * Hiển thị chi tiết hồ sơ mượn.
     */
    public function show(Borrowing $borrowing)
    {
        $borrowing->load(['student', 'librarian']);
        return view('borrowings.show', compact('borrowing'));
    }

    /**
     * Hiển thị giao diện chỉnh sửa hồ sơ mượn.
     */
    public function edit(Borrowing $borrowing)
    {
        $students = Student::all();
        $librarians = Librarian::all();
        return view('borrowings.edit', compact('borrowing', 'students', 'librarians'));
    }

    /**
     * Cập nhật hồ sơ mượn.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        try {
            $validated = $request->validate([
                'student_id' => 'required|exists:students,id',
                'librarian_id' => 'required|exists:librarians,id',
                'bookname' => 'required|string|max:255',
                'dateborrowed' => 'required|date',
                'datereturn' => 'nullable|date|after_or_equal:dateborrowed',
            ]);

            $student = Student::find($request->student_id);
            $validated['studentname'] = $student->studentname;

            $borrowing->update($validated);

            return redirect()->route('borrowings.index')->with('success', 'Hồ sơ mượn được cập nhật thành công.');
        } catch (Exception $e) {
            Log::error('Lỗi khi cập nhật hồ sơ mượn', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra khi cập nhật: ' . $e->getMessage()]);
        }
    }

    /**
     * Xóa hồ sơ mượn.
     */
    public function destroy(Borrowing $borrowing)
    {
        try {
            $borrowing->delete();
            return redirect()->route('borrowings.index')->with('success', 'Hồ sơ mượn đã được xóa thành công.');
        } catch (Exception $e) {
            Log::error('Lỗi khi xóa hồ sơ mượn', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra khi xóa: ' . $e->getMessage()]);
        }
    }
}

Hướng dẫn cài đặt
Để chạy dự án trên máy cục bộ, làm theo các bước sau:

Tải mã nguồn từ GitHub:
git clone https://github.com/NhungVu248/library.git
cd library


Cài đặt phụ thuộc:
composer install
npm install


Thiết lập môi trường:

Sao chép tệp .env.example thành .env:cp .env.example .env


Cấu hình tệp .env với thông tin cơ sở dữ liệu (MySQL) và các thiết lập khác.
Tạo khóa ứng dụng:php artisan key:generate




Chạy migration:
php artisan migrate


Khởi động server phát triển:
php artisan serve

Truy cập ứng dụng tại http://localhost:8000.

Biên dịch tài nguyên giao diện:
npm run dev



Hướng dẫn sử dụng

Đăng nhập: Người dùng cần đăng nhập để truy cập hệ thống.
Bảng điều khiển: Xem và quản lý sách, sinh viên, thủ thư và hồ sơ mượn/trả.
Quản lý hồ sơ: Cập nhật thông tin cá nhân hoặc xóa tài khoản.
Tìm kiếm và lọc: Sử dụng chức năng tìm kiếm và lọc để tìm bản ghi nhanh chóng.

Đóng góp
Mọi đóng góp đều được hoan nghênh! Vui lòng fork kho mã nguồn và gửi pull request với các thay đổi của bạn. Đảm bảo mã nguồn tuân thủ chuẩn code của dự án và bao gồm các bài kiểm tra phù hợp.
Giấy phép
Dự án này là mã nguồn mở và được cấp phép theo MIT License.
Lời cảm ơn

Cảm ơn Đại học Phenikaa đã tạo cơ hội để thực hiện dự án này.
Đặc biệt cảm ơn cộng đồng Laravel vì tài liệu tuyệt vời và các gói hỗ trợ.
