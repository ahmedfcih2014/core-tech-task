<?php

namespace App\Http\Controllers\Apis;

use App\Http\Requests\Posts\UpdatePost;
use App\Models\Post;

class PostsController extends ApiController
{
    public function update(UpdatePost $request, Post $post)
    {
        $post->update($request->validated());
        return $this->success(['message' => 'Post updated successfully.']);
    }
}
