<?php

namespace App\Listeners;

use App\Events\PostStoredEvent;
use App\Mail\PostStoredMail;
use App\Models\Subscription;

class PostStoredListener
{
    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(PostStoredEvent $event)
    {
        $subscriptions = Subscription::where('website', $event->post->website)->get();
        $subscriptions->each(
            fn($subscription) => \Mail::to($subscription->email)->queue(new PostStoredMail($event->post)),
        );
    }
}
