<?php
use Phalcon\Mvc\Controller;
use Mailgun\Mailgun as MailGun;
use Phalcon\Mvc\View;
use Phalcon\Http\Client\Request;

/**
 * Class ApiController
 * @description handles calls to our front end and to mailgun with memcache for caching calls
 */

class ApiController extends ControllerBase
{
    //holder for our api libary
    private $_api = null;

    private $_cache = null;      //memcache

    private $_mailGun = null;    //mailgun

    //override
    public function initialize(){}

    //constructor
    public function onConstruct(){
        //disable view as were not rendering

        //setup our memcache
        //@todo add setting in config
        $frontCache = new \Phalcon\Cache\Frontend\Data(array(
            "lifetime" => 300
        ));
        //Create the Cache setting memcached connection options
        $this->_cache = new \Phalcon\Cache\Backend\Memcache($frontCache, array(
            'host' => 'localhost',
            'port' => 11211,
            'persistent' => false
        ));
    }

    /**
     * GET api/
     */
    public function indexAction()
    {

        return $this->Api()->response("Incorrect API call",false);
    }

    /**
     * GET api/getLists
     * @returns json list of mailinglists
     */
    public function getListsAction(){


        //GET /lists
        return $this->Api()->response($this->getCall('lists'));

    }

    /**
     * @return \Api\Response\Api|Api Singleton
     */
    protected function Api()
    {
        if($this->_api == null)
            $this->_api = new Api\Response\Api();

        return $this->_api;
    }


    /****below this are non api calls****/

    /**
     * @param $cacheKey to be referenced against
     * @param $data to be stored
     */
   private function setCache($cacheKey,$data){
       $this->_cache->save($cacheKey, $data);
   }

    /**
     * @param $cacheKey key stored agaist
     * @return mixed | bool false if no data from key
     */
    private function getCache($cacheKey){
        return $this->_cache->get($cacheKey);
    }

    /**
     * @description handles calls between memcache and mailgun for any GET calls
     * @param $call
     * @return bool|mixed|stdClass
     */
    private function getCall($call){
        //check if we have this call cached
      if  ($response = $this->getCache($call))
          return $response;

        //not in cache lets call mailGun
        $response = $this->mailGun()->get($call);
        $this->setCache($call,$response);

        return $response;
    }

    /**
     * @return Mailgun\Mailgun singleton of mailGun vendor
     */
    private function mailGun(){
        if($this->_mailGun == null)
            $this->_mailGun = new MailGun($this->mailgun->api_key);

        return $this->_mailGun;
    }
}
