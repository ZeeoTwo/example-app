<?php

namespace Database\Factories;

use App\Models\Comment;
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
        $commentIds = Comment::pluck('id')->toArray();
        $parentId = count($commentIds) > 0 && $this->faker->boolean(50) ? Arr::random($commentIds) : null;
        if (is_null($parentId)) {
            $commentIds[] = null;
            $parentId = null;
        }

        return [
            'content_comment' => $this->faker->words(3, true),
            'author_id' => User::all()->random()->id,
            'post_id' => Publication::all()->random()->id,
            'parent_id'=> $parentId,
        ];
    }
}
