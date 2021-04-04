<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_sub'=>$this->faker->text(25),
            'name_teacher'=>$this->faker->name,
            'group_id'=>1,
            'created_at'=>now(),
            'semester'=>$this->faker->numberBetween(1,2),
        ];
    }
}
