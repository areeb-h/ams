<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\StudyGroup;
use App\Models\StudySession;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StudySessionController
 */
final class StudySessionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $studySessions = StudySession::factory()->count(3)->create();

        $response = $this->get(route('study-sessions.index'));

        $response->assertOk();
        $response->assertViewIs('studySession.index');
        $response->assertViewHas('studySessions');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('study-sessions.create'));

        $response->assertOk();
        $response->assertViewIs('studySession.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StudySessionController::class,
            'store',
            \App\Http\Requests\StudySessionStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $from_time = Carbon::parse($this->faker->dateTime());
        $to_time = Carbon::parse($this->faker->dateTime());
        $duration = $this->faker->numberBetween(-10000, 10000);
        $description = $this->faker->text();
        $study_group = StudyGroup::factory()->create();

        $response = $this->post(route('study-sessions.store'), [
            'from_time' => $from_time->toDateTimeString(),
            'to_time' => $to_time->toDateTimeString(),
            'duration' => $duration,
            'description' => $description,
            'study_group_id' => $study_group->id,
        ]);

        $studySessions = StudySession::query()
            ->where('from_time', $from_time)
            ->where('to_time', $to_time)
            ->where('duration', $duration)
            ->where('description', $description)
            ->where('study_group_id', $study_group->id)
            ->get();
        $this->assertCount(1, $studySessions);
        $studySession = $studySessions->first();

        $response->assertRedirect(route('studySessions.index'));
        $response->assertSessionHas('studySession.id', $studySession->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $studySession = StudySession::factory()->create();

        $response = $this->get(route('study-sessions.show', $studySession));

        $response->assertOk();
        $response->assertViewIs('studySession.show');
        $response->assertViewHas('studySession');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $studySession = StudySession::factory()->create();

        $response = $this->get(route('study-sessions.edit', $studySession));

        $response->assertOk();
        $response->assertViewIs('studySession.edit');
        $response->assertViewHas('studySession');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StudySessionController::class,
            'update',
            \App\Http\Requests\StudySessionUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $studySession = StudySession::factory()->create();
        $from_time = Carbon::parse($this->faker->dateTime());
        $to_time = Carbon::parse($this->faker->dateTime());
        $duration = $this->faker->numberBetween(-10000, 10000);
        $description = $this->faker->text();
        $study_group = StudyGroup::factory()->create();

        $response = $this->put(route('study-sessions.update', $studySession), [
            'from_time' => $from_time->toDateTimeString(),
            'to_time' => $to_time->toDateTimeString(),
            'duration' => $duration,
            'description' => $description,
            'study_group_id' => $study_group->id,
        ]);

        $studySession->refresh();

        $response->assertRedirect(route('studySessions.index'));
        $response->assertSessionHas('studySession.id', $studySession->id);

        $this->assertEquals($from_time, $studySession->from_time);
        $this->assertEquals($to_time, $studySession->to_time);
        $this->assertEquals($duration, $studySession->duration);
        $this->assertEquals($description, $studySession->description);
        $this->assertEquals($study_group->id, $studySession->study_group_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $studySession = StudySession::factory()->create();

        $response = $this->delete(route('study-sessions.destroy', $studySession));

        $response->assertRedirect(route('studySessions.index'));

        $this->assertModelMissing($studySession);
    }
}
