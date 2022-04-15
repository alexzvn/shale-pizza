<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VisitManageCategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected Admin $admin;

    protected function setup(): void
    {
        parent::setup();

        /**
         * @var \Illuminate\Contracts\Auth\Authenticatable
         */
        $this->admin = Admin::factory()->makeOne();

        auth()->login($this->admin, true);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_visit_categories()
    {
        $this->followingRedirects()->get(route('manager.category.create'))
            ->assertStatus(200)
            ->assertSee('Create Category');
    }

    public function test_visit_create_create_category()
    {
        $this->followingRedirects()->get(route('manager.category.create'))
            ->assertStatus(200)
            ->assertSee('Create Category');

        $category = $this->faker->name;

        $response = $this->followingRedirects()->post(route('manager.category.store'), [
            'name' => $category,
        ]);

        $response->assertSuccessful()
            ->assertSee($category);
    }

    public function test_visit_edit_category()
    {
        $category = Category::factory()->createOne();
        $name = $this->faker->name;

        $this->get(route('manager.category.edit', $category))->assertSuccessful();

        $this->followingRedirects()->post(route('manager.category.update', $category), compact('name'))
            ->assertSuccessful()
            ->assertSee($name);
    }
}
