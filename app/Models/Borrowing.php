<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = ['student_id', 'librarian_id', 'studentname', 'bookname', 'dateborrowed', 'datereturn'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function librarian()
    {
        return $this->belongsTo(Librarian::class, 'librarian_id');
    }
}
