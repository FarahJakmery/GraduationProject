<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->name,
            'description'  => $this->faker->text(40),
            'logo'  => $this->faker->imageUrl(250, 300),
            'professor_id'   => $this->faker->numberBetween(1, 2),
            'semester_id'   => $this->faker->numberBetween(1, 10)
        ];
    }
}
