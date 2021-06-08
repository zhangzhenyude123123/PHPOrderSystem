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
            'reserve_code'=>$this->faker->randomAscii(),
            'event_id'=>$this->faker->numberBetween(1,1),
            'current_day'=>$this->faker->numberBetween(0,0),
            'validate'=>$this->faker->numberBetween(0,0)
        ];
    }
}
