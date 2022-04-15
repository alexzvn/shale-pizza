<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Food;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VisitManageFoodTest extends TestCase
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

    public function test_visit_foods()
    {
        $this->get(route('manager.foods.index'))->assertSuccessful();
    }

    public function test_create_food()
    {
        $this->get(route('manager.foods.create'))->assertSuccessful();

        $food = $this->makeFood();

        $response = $this->post(route('manager.foods.store'), $food->only(
            'name',
            'price',
            'description',
            'category_id',
            'image'
        ));

        $response->assertRedirect(route('manager.foods.index'))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('foods', $food->only('name', 'price', 'description', 'category_id'));
    }

    public function test_update_food()
    {
        $food = Food::factory()->createOne();

        $this->get(route('manager.foods.edit', $food))->assertSuccessful();

        $food->fill($this->makeFood()->only('name', 'price', 'description', 'category_id'));

        $response = $this->put(route('manager.foods.update', $food), $food->only(
            'name',
            'price',
            'description',
            'category_id',
            'image'
        ));

        $response->assertRedirect(route('manager.foods.index'))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('foods', $food->only('name', 'price', 'description', 'category_id'));
    }

    public function test_delete_food()
    {
        $food = Food::factory()->createOne();

        $response = $this->post(route('manager.foods.delete', $food));

        $response->assertRedirect(route('manager.foods.index'))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('foods', $food->only('name', 'price', 'description', 'category_id'));
    }

    protected function makeFood()
    {
        $food = Food::factory()->make();

        $food->category_id = null;

        return $food;
    }
}
