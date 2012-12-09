<?php
/**
 * Backlog management
 *
 * @since         2012-12-08
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * @author IKEDA Youhei <youhey.ikeda@gmail.com>
 */
class AppController extends Controller {

    /**
     * Array containing the names of components this controller uses.
     *
     * @var array
     */
    public $components = array('RequestHandler');

    /**
     * Called before the controller action.
     * 
     * @return void
     */
    public function beforeFilter() {
        $this->response->header('Access-Control-Allow-Origin', '*');
    }
}

