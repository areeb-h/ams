<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\StudyGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StudyGroupController
 */
final class StudyGroupControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $studyGroups = StudyGroup::factory()->count(3)->create();

        $response = $this->get(route('study-groups.index'));

        $response->assertOk();
        $response->assertViewIs('studyGroup.index');
        $response->assertViewHas('studyGroups');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('study-groups.create'));

        $response->assertOk();
        $response->assertViewIs('studyGroup.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StudyGroupController::class,
            'store',
            \App\Http\Requests\StudyGroupStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $from_time = Carbon::parse($this->faker->dateTime());
        $to_time = Carbon::parse($this->faker->dateTime());
        $duration = $this->faker->numberBetween(-10000, 10000);
        $description = $this->faker->text();

        $response = $this->post(route('study-groups.store'), [
            'from_time' => $from_time->toDateTimeString(),
            'to_time' => $to_time->toDateTimeString(),
            'duration' => $duration,
            'description' => $description,
        ]);

        $studyGroups = StudyGroup::query()
            ->where('from_time', $from_time)
            ->where('to_time', $to_time)
            ->where('duration', $duration)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $studyGroups);
        $studyGroup = $studyGroups->first();

        $response->assertRedirect(route('studyGroups.index'));
        $response->assertSessionHas('studyGroup.id', $studyGroup->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $studyGroup = StudyGroup::factory()->create();

        $response = $this->get(route('study-groups.show', $studyGroup));

        $response->assertOk();
        $response->assertViewIs('studyGroup.show');
        $response->assertViewHas('studyGroup');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $studyGroup = StudyGroup::factory()->create();

        $response = $this->get(route('study-groups.edit', $studyGroup));

        $response->assertOk();
        $response->assertViewIs('studyGroup.edit');
        $response->assertViewHas('studyGroup');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StudyGroupController::class,
            'update',
            \App\Http\Requests\StudyGroupUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $studyGroup = StudyGroup::factory()->create();
        $from_time = Carbon::parse($this->faker->dateTime());
        $to_time = Carbon::parse($this->faker->dateTime());
        $duration = $this->faker->numberBetween(-10000, 10000);
        $description = $this->faker->text();

        $response = $this->put(route('study-groups.update', $studyGroup), [
            'from_time' => $from_time->toDateTimeString(),
            'to_time' => $to_time->toDateTimeString(),
            'duration' => $duration,
            'description' => $description,
        ]);

        $studyGroup->refresh();

        $response->assertRedirect(route('studyGroups.index'));
        $response->assertSessionHas('studyGroup.id', $studyGroup->id);

        $this->assertEquals($from_time, $studyGroup->from_time);
        $this->assertEquals($to_time, $studyGroup->to_time);
        $this->assertEquals($duration, $studyGroup->duration);
        $this->assertEquals($description, $studyGroup->description);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $studyGroup = StudyGroup::factory()->create();

        $response = $this->delete(route('study-groups.destroy', $studyGroup));

        $response->assertRedirect(route('studyGroups.index'));

        $this->assertModelMissing($studyGroup);
    }
}
