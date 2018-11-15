<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\Logging\Log;
use Illuminate\View\View;

class FacebookComposer
{
    /**
     * @var Log
     */
    protected $log;
    private $facebook;

    const FACEBOOK_NODE = '232397476943086';
    const FACEBOOK_EDGE = 'ratings';

    public function __construct(Log $log)
    {
        $this->facebook = new \Facebook\Facebook([
            'app_id' => config('facebook.app_id'),
            'app_secret' => config('facebook.app_secret'),
            'default_graph_version' => 'v3.2',
            'default_access_token' => config('facebook.default_access_token')
        ]);

        $this->log = $log;
    }

    public function compose(View $view)
    {
        try {
            // Get the \Facebook\GraphNodes\GraphUser object for the current user.
            // If you provided a 'default_access_token', the '{access-token}' is optional.
            $response = $this->facebook->get($this->getEndpoint(), null);
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            $this->log->error('Graph returned an error: ' . $e->getMessage());
            return;
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            $this->log->error('Graph returned an error: ' . $e->getMessage());
            return;
        }

        $facebook_ratings = collect($response->getDecodedBody()['data'])->map(function($review){
            return (object)$review;
        })->all();
        $view->with('facebook_ratings', $facebook_ratings);
    }

    private function getEndpoint()
    {
        return implode('/', [ config('facebook.node'), self::FACEBOOK_EDGE]);
    }
}