<?php declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Contracts\CreateStudentGroupActionContract;
use App\Contracts\UpdateStudentGroupActionContract;
use App\DataTransferObjects\StudentData;
use App\Filters\StudentFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\ShowOneStudentResource;
use App\Http\Resources\StudentCollection;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;


class StudentController extends Controller
{
    public function index(StudentFilter $studentFilter): StudentCollection
    {
        $students = Student::filter($studentFilter)->orderBy('first_name')->paginate(15);

        return new StudentCollection($students);
    }

    public function store(StudentRequest $request, CreateStudentGroupActionContract $createStudentGroupAction): JsonResponse
    {
        $studentData = StudentData::fromRequest($request);
        $newStudent = $createStudentGroupAction($studentData);
        if ($newStudent) {
            return (new ShowOneStudentResource($newStudent))
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
        }

        return new JsonResponse('error to adding new student', Response::HTTP_NOT_IMPLEMENTED);
    }

    public function show(Student $student): ShowOneStudentResource
    {
        return new ShowOneStudentResource($student);
    }

    public function update(
        StudentRequest $request,
        string $id,
        UpdateStudentGroupActionContract $updateStudentGroupAction
    ): JsonResponse
    {
        $studentData = StudentData::fromRequest($request);
        $updatedStudent = $updateStudentGroupAction($id, $studentData);
        if ($updatedStudent) {
            return (new ShowOneStudentResource($updatedStudent))
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
        }

        return new JsonResponse('Error updating new student or student not found', Response::HTTP_NOT_IMPLEMENTED);
    }

    public function destroy(Student $student): JsonResponse
    {
        if ($student->delete()) {
            return new JsonResponse('Student was deleted', Response::HTTP_OK);
        }
    }
}
