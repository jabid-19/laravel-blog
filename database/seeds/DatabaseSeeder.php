<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\User;
use App\Post;
use App\Forum;
use App\Tag;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Category::truncate();
        Post::truncate();
        Tag::truncate();
        Forum::truncate();

        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
        ]);

        factory(User::class)->create([
            'name' => 'User',
            'email' => 'user@mail.com',
        ]);

        factory(Category::class, 5)->create();
        factory(Post::class, 15)->create();
        factory(Tag::class, 50)->create();
        factory(Forum::class, 15)->create();
    }
}
