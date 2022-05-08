<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostStoredEvent
{
    use Dispatchable, SerializesModels;

    /**
     * The post instance.
     *
     * @var \App\Models\Post
     */
    public $post;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }
}
