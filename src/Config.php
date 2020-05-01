<?php
/**
 *
 * (c) Wolfred Montilla <wolfrednicolas@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */ 
namespace wnmd1987\ImpossibleSoftware;

/**
 * This is configuration file for videos based on Impossible Software
 *
 * @author Wolfred Montilla <wolfrednicolas@gmail.com>
 */

class Config
{
    public $config;

    /**
     * set all the environment variables using in the classes
     *
     * @param array        $config
     */ 
    public function __construct()
    {
      $this->config = [ 
                        "youtube" => [
                            "auth_secret" => getenv("youtube_auth_secret"),
                            'category' => '22',
                            'scope' => 'https://www.googleapis.com/auth/youtube'  
                        ],
                        'auth' => [
                            'key' => getenv("impossible_key"),
                            'secret' => getenv("impossible_secret")
                        ],
                        'connection'=> [
                            'region'=>'us-west-2',
                            'prjuid'    => getenv("impossible_connection_prjuid"),
                            'url' => 'https://xml.impossible.io/v1/render/'
                        ],
                        'google' => [
                            'developer_key' => getenv("google_developer_key"),
                            'client_id' => getenv("google_client_id"),
                            'secret' => getenv("google_secret"),
                            'token' => getenv("google_token")
                        ]

                      ];
    }
}