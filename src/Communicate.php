<?php
/**
 *
 * (c) Wolfred Montilla <wolfrednicolas@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */ 
namespace wnmd1987\ImpossibleSoftware;

use URL;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Google_Client;
use Google_Service_YouTube;

/**
 * This is configuration file for videos based on Impossible Software
 *
 * @author Wolfred Montilla <wolfrednicolas@gmail.com>
 */

class Communicate
{
    protected $config;

    /**
     * Instance all the third party services and important classes
     */
    public function __construct(){
        $config = new Config();
        $this->config = $config->config;
        $this->conf = $config;
        #$this->functions = new Functions();
    }

    /**
     * Create a new video on youtube parsing a xml using Impossible Software
     *
     * @param string      $definition
     * @param array       $data
     * @return array
     */ 

    public function create($definition, $data)
    {
        $youtube = [
            "type"        =>"youtube",
            "auth_secret" => $this->config['youtube']['auth_secret'],
            "title"       => $data['title'],
            "description" => $data['description'],
            "category"    => $this->config['youtube']['category'],
            "status"      => "public"         
        ];
        $youtube = json_encode($youtube);

        try {
            $client = new Client;
            $response = $client->request('POST', $this->config['connection']['url'].$this->config['connection']['region'].'/'.$this->config['connection']['prjuid'], [
                  'auth' => [$this->config['auth']['key'], $this->config['auth']['secret']],
                  'form_params'=>['template'=>$definition, 'destination'=>$youtube]
              ]);
            $dataToSend = json_decode($response->getBody());

            $data = [
                'duration'=>0, 
                'output'=>"https://www.youtube.com/watch?v=".$dataToSend->upload->result
            ];
            return $data;
        } 
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteVideo($video)
    {   
        $client = new Google_Client();
        $client->setDeveloperKey($this->config['google']['developer_key']);
        $client->setClientId($this->config['google']['client_id']);
        $client->setClientSecret($this->config['google']['secret']);
        $client->setScopes([$this->config['youtube']['scope']]);

        $token = $this->config['google']['token'];
        $token = '{"refresh_token":"{$token}"}';
        $client->setAccessToken($token);

        $youtube = new Google_Service_YouTube($client);
        $delete = $youtube->videos->delete($video);
        
    }



} 