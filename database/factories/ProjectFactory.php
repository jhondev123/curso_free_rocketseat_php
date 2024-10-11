<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->paragraph(3),
            'ends_at' => $this->faker->dateTimeBetween('now', '+3 days'),
            'status' => $this->faker->randomElement(['open', 'closed']),
            'tech_stack' => fake()->randomElements(['nodejs', 'react', 'javascript', 'vite', 'nextjs'], random_int(1, 5)),

            'created_by' => User::factory(),

        ];
    }
}
