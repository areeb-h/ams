<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CourseController
 */
final class CourseControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $courses = Course::factory()->count(3)->create();

        $response = $this->get(route('courses.index'));

        $response->assertOk();
        $response->assertViewIs('course.index');
        $response->assertViewHas('courses');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('courses.create'));

        $response->assertOk();
        $response->assertViewIs('course.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CourseController::class,
            'store',
            \App\Http\Requests\CourseStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name();
        $age_range = $this->faker->word();
        $description = $this->faker->text();

        $response = $this->post(route('courses.store'), [
            'name' => $name,
            'age_range' => $age_range,
            'description' => $description,
        ]);

        $courses = Course::query()
            ->where('name', $name)
            ->where('age_range', $age_range)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $courses);
        $course = $courses->first();

        $response->assertRedirect(route('courses.index'));
        $response->assertSessionHas('course.id', $course->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $course = Course::factory()->create();

        $response = $this->get(route('courses.show', $course));

        $response->assertOk();
        $response->assertViewIs('course.show');
        $response->assertViewHas('course');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $course = Course::factory()->create();

        $response = $this->get(route('courses.edit', $course));

        $response->assertOk();
        $response->assertViewIs('course.edit');
        $response->assertViewHas('course');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CourseController::class,
            'update',
            \App\Http\Requests\CourseUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $course = Course::factory()->create();
        $name = $this->faker->name();
        $age_range = $this->faker->word();
        $description = $this->faker->text();

        $response = $this->put(route('courses.update', $course), [
            'name' => $name,
            'age_range' => $age_range,
            'description' => $description,
        ]);

        $course->refresh();

        $response->assertRedirect(route('courses.index'));
        $response->assertSessionHas('course.id', $course->id);

        $this->assertEquals($name, $course->name);
        $this->assertEquals($age_range, $course->age_range);
        $this->assertEquals($description, $course->description);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $course = Course::factory()->create();

        $response = $this->delete(route('courses.destroy', $course));

        $response->assertRedirect(route('courses.index'));

        $this->assertModelMissing($course);
    }
}
