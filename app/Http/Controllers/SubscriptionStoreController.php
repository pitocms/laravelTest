<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionStoreRequest;
use App\Models\Subscription;
// use App\Models\Website;

class SubscriptionStoreController extends Controller
{
    /**
     * Store subscription.
     *
     * @param \App\Http\Requests\SubscriptionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SubscriptionStoreRequest $request)
    {
        // $website = Website::firstOrCreate(['website' => $request->validated('website')]);
        $subscription = Subscription::create($request->validated());
        return response()->json([
            'data' => [
                'subscription' => $subscription,
            ],
            'message' => 'Subscription created successfully.',
        ]);
    }
}
