<?php
/**
 * Created by PhpStorm.
 * User: Luke Hardiman
 * Date: 8/08/2015
 * Time: 12:17 AM
 */


use project\toa;
use \Phalcon\Di;
use Phalcon\Mvc\View as View;

/**
 * Class UnitTest
 */
class LoginControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The controller instance
     * @var Object
     */
    protected $view;
	/**
	 * The controller instance
	 * @var Object
	 */
	protected $controller;
    /**
     * The dependency object
     * @var Object
     */
    protected $di;

	/**
	 * Set up the test environment
	 * @return void
	 */
	public function setUp()
	{
		//$this->controller = new LoginController;
        $this->controller = new LoginController();

        $this->view = new View();
        $this->view->disable();
        $this->di = DI::getDefault();
		parent::setUp();
	}
    /**
     * Returns the Di object
     * @return object
     */
    private function getDi(){
        return $this->di;
    }

    /**
     *  Test errorCheck on loginController
     */
	public function test_ErrorCheck(){


        $LoginController = new LoginController();
        $class = new ReflectionClass ($LoginController);

        $method = $class->getMethod ('errorCheck');
        //we are testing a private method so make it accessible
        $method->setAccessible(TRUE);

        //should return false no errors to check against
        $output_false = $method->invoke($LoginController);
        $this->assertEquals(false,
            $output_false
        );

        //we need to capture this output as it forces a redirect
        ob_start();
        $method->invoke($LoginController,array("Failed login"));   //invoke
        $output_redirect = ob_get_flush();  //capture and clear buffer

        //check we were redirect to the login-form which is a post
        $this->assertContains('id="login-form"',
            $output_redirect
        );

    }



}