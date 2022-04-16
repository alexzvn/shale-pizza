<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VisitManageFoodTest extends TestCase
{
    use WithFaker;

    protected Admin $admin;

    protected function setup(): void
    {
        parent::setup();

        /**
         * @var \Illuminate\Contracts\Auth\Authenticatable
         */
        $this->admin = Admin::factory()->makeOne();

        Category::factory(10)->create();

        auth()->login($this->admin, true);
    }

    public function test_visit_foods()
    {
        $this->get(route('manager.foods'))->assertSuccessful();
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

        $response->assertRedirect(route('manager.foods'))
            ->assertSessionHasNoErrors();
    }

    public function test_update_food()
    {
        $food = Food::factory()->createOne();

        $this->get(route('manager.foods.edit', $food))->assertSuccessful();

        $food->fill($this->makeFood()->only('name', 'price', 'description'));

        $response = $this->post(route('manager.foods.update', $food), $food->only(
            'name',
            'price',
            'description',
            'category_id',
            'image'
        ));

        $response->assertRedirect(route('manager.foods'))
            ->assertSessionHasNoErrors();
    }

    public function test_delete_food()
    {
        $food = Food::factory()->createOne();

        $response = $this->post(route('manager.foods.delete', $food));

        $response->assertRedirect(route('manager.foods'))
            ->assertSessionHasNoErrors();
    }

    protected function makeFood()
    {
        $food = Food::factory()->make();

        $food->category_id = 1;

        return $food;
    }
}
