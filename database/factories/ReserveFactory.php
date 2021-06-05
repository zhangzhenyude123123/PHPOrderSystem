<?php

namespace Database\Factories;

use App\Models\Reserve;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReserveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reserve::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> $this->faker->randomNumber(),
            'reserve_code'=>$this->faker->text(),
            'event_id'=>$this->faker->randomNumber(),
            'current_day'=>$this->faker->randomNumber(),
            'validate'=>$this->faker->numberBetween(0,0)
        ];
    }
}
