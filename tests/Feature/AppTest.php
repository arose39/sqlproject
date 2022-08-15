<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan("migrate:fresh --seed");
    }

    public function testAllPagesWorking()
    {
        $responseMainPage = $this->get('/');
        $responseMainPage->assertStatus(200);

        $responseStudentsPage = $this->get('/students');
        $responseStudentsPage->assertStatus(200);

        $responseOneStudentPage = $this->get('/students/1');
        $responseOneStudentPage->assertStatus(200);

        $responseCoursesPage = $this->get('/courses');
        $responseCoursesPage->assertStatus(200);

        $responseGroupsPage = $this->get('/groups');
        $responseGroupsPage->assertStatus(200);
    }
}
