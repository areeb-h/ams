<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\StudySession;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AttendanceController
 */
final class AttendanceControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $attendances = Attendance::factory()->count(3)->create();

        $response = $this->get(route('attendances.index'));

        $response->assertOk();
        $response->assertViewIs('attendance.index');
        $response->assertViewHas('attendances');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('attendances.create'));

        $response->assertOk();
        $response->assertViewIs('attendance.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AttendanceController::class,
            'store',
            \App\Http\Requests\AttendanceStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $attended = $this->faker->boolean();
        $student = Student::factory()->create();
        $study_session = StudySession::factory()->create();

        $response = $this->post(route('attendances.store'), [
            'attended' => $attended,
            'student_id' => $student->id,
            'study_session_id' => $study_session->id,
        ]);

        $attendances = Attendance::query()
            ->where('attended', $attended)
            ->where('student_id', $student->id)
            ->where('study_session_id', $study_session->id)
            ->get();
        $this->assertCount(1, $attendances);
        $attendance = $attendances->first();

        $response->assertRedirect(route('attendances.index'));
        $response->assertSessionHas('attendance.id', $attendance->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $attendance = Attendance::factory()->create();

        $response = $this->get(route('attendances.show', $attendance));

        $response->assertOk();
        $response->assertViewIs('attendance.show');
        $response->assertViewHas('attendance');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $attendance = Attendance::factory()->create();

        $response = $this->get(route('attendances.edit', $attendance));

        $response->assertOk();
        $response->assertViewIs('attendance.edit');
        $response->assertViewHas('attendance');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AttendanceController::class,
            'update',
            \App\Http\Requests\AttendanceUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $attendance = Attendance::factory()->create();
        $attended = $this->faker->boolean();
        $student = Student::factory()->create();
        $study_session = StudySession::factory()->create();

        $response = $this->put(route('attendances.update', $attendance), [
            'attended' => $attended,
            'student_id' => $student->id,
            'study_session_id' => $study_session->id,
        ]);

        $attendance->refresh();

        $response->assertRedirect(route('attendances.index'));
        $response->assertSessionHas('attendance.id', $attendance->id);

        $this->assertEquals($attended, $attendance->attended);
        $this->assertEquals($student->id, $attendance->student_id);
        $this->assertEquals($study_session->id, $attendance->study_session_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $attendance = Attendance::factory()->create();

        $response = $this->delete(route('attendances.destroy', $attendance));

        $response->assertRedirect(route('attendances.index'));

        $this->assertModelMissing($attendance);
    }
}
