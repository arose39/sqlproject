<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan("migrate:fresh --seed");
    }

    public function testJsonFormattedResponses()
    {
        $reportResponse = $this->get('/api/v1/students');
        $reportResponse->assertStatus(200);
        $reportResponse->assertHeader("Content-Type", 'application/json');

        $racersListResponse = $this->get('/api/v1/groups');
        $racersListResponse->assertStatus(200);
        $racersListResponse->assertHeader("Content-Type", 'application/json');

        $racerInfoResponse = $this->get('/api/v1/courses');
        $racerInfoResponse->assertStatus(200);
        $racerInfoResponse->assertHeader("Content-Type", 'application/json');
    }

    public function testStudentsDataCorrect()
    {
        $racersListResponse = $this->get('/api/v1/students');
        $racersListResponse->assertJsonStructure([
            'data' => [
                0 => [
                    "first_name",
                    "last_name",
                    "group",
                    "courses"
                ]
            ]
        ]);
    }

    public function testOneStudentDataCorrect()
    {
        $racersListResponse = $this->get('/api/v1/students/1');
        $racersListResponse->assertJsonStructure([
            'data' => [
                "id",
                "first_name",
                "last_name",
                "group",
                "group_id",
                "created_at",
                "updated_at",
                "courses"
            ]
        ]);
    }

    public function testGroupsDataCorrect()
    {
        $racersListResponse = $this->get('/api/v1/groups');
        $racersListResponse->assertJsonStructure([
            'data' => [
                0 => [
                    "id",
                    "name",
                    "created_at",
                    "updated_at"
                ]
            ]
        ]);
    }

    public function testCoursesDataCorrect()
    {
        $racersListResponse = $this->get('/api/v1/courses');
        $racersListResponse->assertJsonStructure([
            'data' => [
                0 => [
                    "id",
                    "name",
                    "description",
                    "created_at",
                    "updated_at"
                ]
            ]
        ]);
    }
}


