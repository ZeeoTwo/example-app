<?php

namespace Database\Factories;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $publicationIds = Publication::pluck('id')->toArray();
        $parentId = $this->faker->boolean(70) ? Arr::random($publicationIds) : null;
        return [
            'content_comment' => $this->faker->words(3, true),
            'author_id' => User::all()->random()->id,
            'post_id' => Publication::all()->random()->id,
            'parent_id'=> $parentId,
        ];
    }
}
