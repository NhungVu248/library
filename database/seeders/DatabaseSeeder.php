<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Librarian;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $librarians = [
            [
                'name' => 'Nguyễn Văn An',
                'email' => 'an.nguyen@example.com',
                'phone' => '0912345678',
                'avatar' => 'https://example.com/avatars/an_nguyen.jpg'
            ],
        ];
        foreach ($librarians as $librarian) {
            Librarian::create([
                'name' => $librarian['name'],
                'email' => $librarian['email'],
                'phone' => $librarian['phone'],
                'avatar' => $librarian['avatar']
            ]);
        }
    }
}
