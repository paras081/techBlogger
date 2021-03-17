<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'title' => $this->faker->sentence,
        'description' =>$this->faker->paragraph,
//        'image_url' => date('dd/mm/yyyy').'jpg',
            'image_url' => $this->faker->url,
//        'tags' => $this->faker->words,
        'user_id' => User::factory()->create(),
        'category' =>$this->faker->randomElement(['HTML', 'CSS','PHP','Laravel','Android']),
        ];
    }
}
