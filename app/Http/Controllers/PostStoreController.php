<?php

namespace App\Http\Controllers;

use App\Events\PostStoredEvent;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
// use App\Models\Website;

class PostStoreController extends Controller
{
    /**
     * Store post.
     *
     * @param \App\Http\Requests\PostStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(PostStoreRequest $request)
    {
        // $website = Website::firstOrCreate(['website' => $request->validated('website')]);
        $post = Post::create($request->validated());
        PostStoredEvent::dispatch($post);
        return responst()->json([
            'data' => [
                'post' => $post,
            ],
            'message' => 'Post created successfully.',
        ]);
    }
}
