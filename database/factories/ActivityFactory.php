<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'activity_id'=>$this->faker->numberBetween(1,5),
            'name'=>$this->faker->name(),
            'carnival_day'=>$this->faker->numberBetween(5,5),
        ];
    }
}
