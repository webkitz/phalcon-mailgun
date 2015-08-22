<?php



class IndexController extends ControllerBase
{

    /**
     * @description initialize
     */
    public function initialize()
    {
        $this->loginCheck();
    }
    /**
     * Display Login View
     */
    public function indexAction()
    {
        //add our cdn files
        $this->assets
            ->addJs('/cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js')
            ->addJs('/cdn.datatables.net/1.10.8/js/dataTables.bootstrap.min.js')
            ->addJs('js/index.js');

    }



}

