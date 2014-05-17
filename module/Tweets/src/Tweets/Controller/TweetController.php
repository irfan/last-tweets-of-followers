<?php

namespace Tweets\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mvc\MvcEvent;
use ZendService\Twitter\Twitter\Twitter;

class TweetController extends AbstractActionController
{
    
    /**
     * @return @ViewModel
     */
    public function listAction()
    {
        $cursor = $this->params()->fromQuery('cursor', -1);
        $twitter = $this->getServiceLocator()->get('twitter');

        // TODO: We need to implement cache to not to make a lot of requests to API
        $twitter->getFollowersList($cursor);
        
        $lastTweets = [];
        
        foreach ($twitter->response->users as $key => $user) {
            $lastTweets[$key]['text'] = isset($user->status->text) ? $user->status->text : 'protected tweet or no tweet found';
            $lastTweets[$key]['name'] = isset($user->screen_name) ? $user->screen_name : null;
        }

        return new ViewModel([
            'tweets' => $lastTweets,
            'cursor' => [
                'previous' => $twitter->response->previous_cursor_str,
                'next' => $twitter->response->next_cursor_str,
            ]
        ]);
    }
}


