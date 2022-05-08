<?php

namespace App\Listeners;

use App\Events\PostStoredEvent;
use App\Mail\PostStoredMail;
use App\Models\Subscription;

class PostStoredListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        \Log::info('hello world', []);
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\PostStoredEvent $event
     * @return void
     */
    public function handle(PostStoredEvent $event)
    {
        $subscriptions = Subscription::where('website', $event->post->website)->get();
        $subscriptions->each(function($subscription) use ($event) {
            \Log::info('hello world', [$subscription->email, $event->post->website]);
            \Mail::to($subscription->email)->queue(new PostStoredMail($event->post));
        });
    }
}
