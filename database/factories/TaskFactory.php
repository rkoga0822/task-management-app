<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->word() . '宿題',
            'body'=>$this->faker->word() . '宿題のタスク',
            'status'=>$this->faker->randomElement(['todo','doing','done']),
            'due_date'=>$this->faker->dateTimeBetween('today', '+1 month') ->format('Y-m-d'),
            'user_id' => User::factory(),
        ];
    }
}
