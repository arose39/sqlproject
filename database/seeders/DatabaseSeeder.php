<?php declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Models\Course::factory(10)->create();
        \App\Models\Group::factory(10)->create();
        \App\Models\Student::factory(200)->create();
        \App\Models\User::factory(20)->create();
        $this->call([
            StudentCourseSeeder::class,
        ]);

         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@admin.com',
             'is_admin' => true,
         ]);
    }
}
