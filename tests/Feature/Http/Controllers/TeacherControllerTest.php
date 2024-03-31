<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TeacherController
 */
final class TeacherControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $teachers = Teacher::factory()->count(3)->create();

        $response = $this->get(route('teachers.index'));

        $response->assertOk();
        $response->assertViewIs('teacher.index');
        $response->assertViewHas('teachers');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('teachers.create'));

        $response->assertOk();
        $response->assertViewIs('teacher.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TeacherController::class,
            'store',
            \App\Http\Requests\TeacherStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name();
        $city = $this->faker->city();
        $country = $this->faker->country();
        $postal_code = $this->faker->postcode();
        $user = User::factory()->create();

        $response = $this->post(route('teachers.store'), [
            'name' => $name,
            'city' => $city,
            'country' => $country,
            'postal_code' => $postal_code,
            'user_id' => $user->id,
        ]);

        $teachers = Teacher::query()
            ->where('name', $name)
            ->where('city', $city)
            ->where('country', $country)
            ->where('postal_code', $postal_code)
            ->where('user_id', $user->id)
            ->get();
        $this->assertCount(1, $teachers);
        $teacher = $teachers->first();

        $response->assertRedirect(route('teachers.index'));
        $response->assertSessionHas('teacher.id', $teacher->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $teacher = Teacher::factory()->create();

        $response = $this->get(route('teachers.show', $teacher));

        $response->assertOk();
        $response->assertViewIs('teacher.show');
        $response->assertViewHas('teacher');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $teacher = Teacher::factory()->create();

        $response = $this->get(route('teachers.edit', $teacher));

        $response->assertOk();
        $response->assertViewIs('teacher.edit');
        $response->assertViewHas('teacher');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TeacherController::class,
            'update',
            \App\Http\Requests\TeacherUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $teacher = Teacher::factory()->create();
        $name = $this->faker->name();
        $city = $this->faker->city();
        $country = $this->faker->country();
        $postal_code = $this->faker->postcode();
        $user = User::factory()->create();

        $response = $this->put(route('teachers.update', $teacher), [
            'name' => $name,
            'city' => $city,
            'country' => $country,
            'postal_code' => $postal_code,
            'user_id' => $user->id,
        ]);

        $teacher->refresh();

        $response->assertRedirect(route('teachers.index'));
        $response->assertSessionHas('teacher.id', $teacher->id);

        $this->assertEquals($name, $teacher->name);
        $this->assertEquals($city, $teacher->city);
        $this->assertEquals($country, $teacher->country);
        $this->assertEquals($postal_code, $teacher->postal_code);
        $this->assertEquals($user->id, $teacher->user_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $teacher = Teacher::factory()->create();

        $response = $this->delete(route('teachers.destroy', $teacher));

        $response->assertRedirect(route('teachers.index'));

        $this->assertModelMissing($teacher);
    }
}
