<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),            
            'description' => $this->faker->sentence(),
            'user_id' => 1,
            //'user_id' => function() {
                //return User::factory()->create()->id;
            //},
        ];
    }
}
