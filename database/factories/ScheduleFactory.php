<?php

namespace Database\Factories;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'day'=>$this->faker->numberBetween(1,5),
            'time'=>$this->faker->numberBetween(1,4),
            'subject_id'=>$this->faker->numberBetween(0,9),
            'group_id'=>1,
            'classroom'=>$this->faker->numberBetween(0,100),
            'created_at'=>now(),
        ];
    }
}
