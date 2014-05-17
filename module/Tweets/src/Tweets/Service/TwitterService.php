<?php
/**
 * TODO:
 * Zend Framework 2 Twitter module does not support some features
 * so, we need to extend and improve it.
 *
 * I'd prefer contribute ZendService\Twitter module, but this
 * class quickest way to finish task.
 */

namespace Tweets\Service;

use ZendService\Twitter\Twitter;
use ZendService\Twitter\Response;

class TwitterService extends Twitter
{

    /**
     * Response of last request
     * @var Response
     */
    public $response = null;
    
    /**
     * The number of how many user will fetch in one request.
     * @var int
     */
    public $numberOfFetch = 100;
    
    /**
     * The cursor, in order to use for next request.
     * @var int
     */
    protected $cursor = -1;
    
    /**
     * The followers list of the user.
     * @var Response
     */
    protected $followers;
    

    public function __construct($config)
    {
        parent::__construct($config);
        
        $this->response = $this->account->verifyCredentials();
        $this->validate();
    }

    public function validate()
    {
        // TODO: Implement new type of exception 

        if (! $this->response->isSuccess()) {
            throw new \Exception();
        }
    }

    public function getFollowersList($cursor = -1)
    {
        $this->cursor = $cursor;
        $this->init();
        $path = 'followers/list';
        $response = $this->get($path, [
            'cursor' => $this->cursor,
            'count'  => $this->numberOfFetch
        ]);
        
        $this->response = new Response($response);
    }

}

