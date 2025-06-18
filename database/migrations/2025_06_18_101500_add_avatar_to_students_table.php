<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Chạy migration để thêm cột avatar vào bảng students.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('avatar')->nullable()->after('phone'); // Thêm cột avatar, cho phép null, đặt sau cột phone
        });
    }

    /**
     * Hoàn tác migration.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('avatar'); // Xóa cột avatar nếu rollback
        });
    }
};