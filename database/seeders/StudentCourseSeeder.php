<?php declare(strict_types=1);

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentCourseSeeder extends Seeder
{
    private Generator $faker;
    private int $numberOfStudents = 200;

    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $studentCourseList = $this->getStudentCourseList();
        DB::table('student_course')->insert($studentCourseList);
    }

    private function withFaker(): Generator
    {
        return Container::getInstance()->make(Generator::class);
    }

    private function getStudentCourseList(): array
    {
        $studentCourseList = [];
        for ($i = 1; $i <= $this->numberOfStudents; $i++) {
            for ($j = 0; $j < $this->faker->numberBetween(1, 3); $j++) {
                $studentCourseList[] = [
                    'student_id' => $i,
                    'course_id' => $this->faker->numberBetween(1, 10),
                ];
            }
        }
        //Удаляет случаи когда у одного студента пару раз один и тот же курс
        $studentCourseList = array_map('unserialize', array_unique(array_map('serialize', $studentCourseList)));

        return $studentCourseList;
    }
}
