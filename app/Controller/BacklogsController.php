<?php
/**
 * Backlog management
 *
 * @since         2012-12-04
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 */

/**
 * Gather information of Backlog
 *
 * @author IKEDA Youhei <youhey.ikeda@gmail.com>
 */
class BacklogsController extends AppController {

    /** Title */
    const TITLE = 'Backlog information';

    /**
     * Called before the controller action.
     *
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title_for_layout', self::TITLE);
    }


    /**
     * for INDEX
     *
     * @return void
     */
    public function index() {
    }

    /**
     * Lists the projects that are using the Subversion
     *
     * @return void
     */
    public function list_svn() {
        $projects = $this->Backlog->fetchProjectsAndSvnUrl();
        $this->set(compact('projects'));
    }
}

