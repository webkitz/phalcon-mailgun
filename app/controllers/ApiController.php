<?php
use Phalcon\Mvc\Controller;
use Mailgun\Mailgun;

use Phalcon\Http\Client\Request;


class ApiController extends Controller
{
    //holder for our api libary
    private $_api = null;

    private $cache = null;      //memcache

    //constructor
    public function onConstruct(){
        //disable view as were not rendering
        $this->view->disable();

        //setup our memcache
        //@todo add setting in config
        $frontCache = new \Phalcon\Cache\Frontend\Data(array(
            "lifetime" => 300
        ));
        //Create the Cache setting memcached connection options
        $this->cache = new \Phalcon\Cache\Backend\Memcache($frontCache, array(
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
        $this->Api()->response("Invalid Call",false);
    }

    /**
     * GET api/getList
     */
    public function getListAction(){

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
       $this->cache->save($cacheKey, $data);
   }

    /**
     * @param $cacheKey key stored agaist
     * @return mixed | bool false if no data from key
     */
    private function getCache($cacheKey){
        return $this->cache->get($cacheKey);
    }
}
