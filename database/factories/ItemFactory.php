<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'     => $this->faker->text(10) . '_item',
            'category' => Category::factory(1)->create()->first(),
            'value'    => $this->faker->numberBetween(10, 100),
            'quality'  => $this->faker->numberBetween(-10, 50),
        ];
    }
}
