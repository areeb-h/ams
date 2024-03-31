<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StudentController
 */
final class StudentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $students = Student::factory()->count(3)->create();

        $response = $this->get(route('students.index'));

        $response->assertOk();
        $response->assertViewIs('student.index');
        $response->assertViewHas('students');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('students.create'));

        $response->assertOk();
        $response->assertViewIs('student.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StudentController::class,
            'store',
            \App\Http\Requests\StudentStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name();
        $admission_date = Carbon::parse($this->faker->dateTime());
        $dob = Carbon::parse($this->faker->dateTime());
        $status = $this->faker->word();

        $response = $this->post(route('students.store'), [
            'name' => $name,
            'admission_date' => $admission_date->toDateTimeString(),
            'dob' => $dob->toDateTimeString(),
            'status' => $status,
        ]);

        $students = Student::query()
            ->where('name', $name)
            ->where('admission_date', $admission_date)
            ->where('dob', $dob)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $students);
        $student = $students->first();

        $response->assertRedirect(route('students.index'));
        $response->assertSessionHas('student.id', $student->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $student = Student::factory()->create();

        $response = $this->get(route('students.show', $student));

        $response->assertOk();
        $response->assertViewIs('student.show');
        $response->assertViewHas('student');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $student = Student::factory()->create();

        $response = $this->get(route('students.edit', $student));

        $response->assertOk();
        $response->assertViewIs('student.edit');
        $response->assertViewHas('student');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StudentController::class,
            'update',
            \App\Http\Requests\StudentUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $student = Student::factory()->create();
        $name = $this->faker->name();
        $admission_date = Carbon::parse($this->faker->dateTime());
        $dob = Carbon::parse($this->faker->dateTime());
        $status = $this->faker->word();

        $response = $this->put(route('students.update', $student), [
            'name' => $name,
            'admission_date' => $admission_date->toDateTimeString(),
            'dob' => $dob->toDateTimeString(),
            'status' => $status,
        ]);

        $student->refresh();

        $response->assertRedirect(route('students.index'));
        $response->assertSessionHas('student.id', $student->id);

        $this->assertEquals($name, $student->name);
        $this->assertEquals($admission_date, $student->admission_date);
        $this->assertEquals($dob, $student->dob);
        $this->assertEquals($status, $student->status);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $student = Student::factory()->create();

        $response = $this->delete(route('students.destroy', $student));

        $response->assertRedirect(route('students.index'));

        $this->assertModelMissing($student);
    }
}
