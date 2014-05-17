<?php
/**
 * Configuration steps:
 *
 * Change the user name in twitter array.
 * Go to https://apps.twitter.com page and create an application.
 * Copy consumer key and consumer secret and put under oauth_options in this config.
 * Generate access token.
 * Put the access token and secret under access_token.
 */
return [
    'router' => [
        'routes' => [
            'ltof' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route'    => '/tweets',
                    'defaults' => [
                        '__NAMESPACE__' => 'Tweets\Controller',
                        'controller'    => 'TweetController',
                        'action'        => 'list',
                        'options'       => [
                            'constraints' => [
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'invokables' => [
            'Tweets\Controller\TweetController' => 'Tweets\Controller\TweetController'
        ],
    ],

    'service_manager' => [
        'factories' => [
            'twitter' => 'Tweets\Service\TwitterFactory'
        ]
    ],

    'view_manager' => [
        'template_map' => [
            'tweets/tweet/index' => __DIR__ . '/../view/tweets/tweet/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'configHelper' => 'Tweets\View\Helper\ConfigHelper'
        ]
    ]
];

/*
    'twitter' => [
        'username' => 'irfandurmus'
        'consumerKey'       => 'cIeNm9obDhYwRtzDfKEyw',
        'consumerSecret'    => '75vKKcUF3v3PBf0UHfzrU2I8VF8AbaKNpLdrkBoiKM',
        'requestTokenUrl'   => 'http://api.twitter.com/oauth/request_token',
        'accessTokenUrl'    => 'http://api.twitter.com/oauth/access_token',
        'authorizeUrl'      => 'http://api.twitter.com/oauth/authorize',

        'callbackUrl'       => 'http://propertytrackr.local/twitter',
        'siteUrl'           => 'http://api.twitter.com/oauth',
        'version'           => '1.1'
    ],
*/

