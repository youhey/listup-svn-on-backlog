<?php
/**
 * Backlog management
 *
 * @since         2012-12-04
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 */

/** Services_Backlog */
require_once 'Services/Backlog.php';

App::uses('HttpSocket', 'Network/Http');
Configure::load('Backlog');

/**
 * The operation of the service API
 *
 * @author IKEDA Youhei <youhey.ikeda@gmail.com>
 */
class Backlog extends AppModel {

    /**
     * Table name
     *
     * @var mixed
     */
    public $useTable = false;

    /**
     * Return an array of project participation
     *
     * @return Array The participation in all projects
     * @throws InternalErrorException If fail to query the API
     */
    public function fetchProjects() {
        $url      = Configure::read('Backlog.url');
        $userName = Configure::read('Backlog.userName');
        $password = Configure::read('Backlog.password');

        $service  = new Services_Backlog($url, $userName, $password);
        $projects = array();
        try {
            $result = $service->getProjects();
            if (!is_array($result)) {
                throw new DomainException('Unknown data type');
            }
            $projects = $result;
        } catch (Exception $e) {
            $message = 'Failed to query the Backlog API: '
                     . 'usedAPI=getProjects: '.$e->getMessage();
            throw new InternalErrorException($message);
        }

        foreach ($projects as &$project) {
            $projectKey = $project['key'];
            $svnUrl     = $this->toSvnUrl($projectKey);
            $projectUrl = $this->toProjectUrl($projectKey);

        $addition = array(
            'svn' => $svnUrl,
            'url' => $projectUrl,
            );
        $project = Set::merge($project, $addition);
        }

        return $projects;
    }

    /**
     * Converted to a URL of Subversion
     *
     * @param String $projectKey The project key
     * @return String|null The URL of Subversion, NULL if the key is empty.
     */
    private function toSvnUrl($projectKey) {
        $formatOfSvnUrl = Configure::read('Backlog.formatOfSvnUrl');  

        $svnUrl = null;
        if (!empty($projectKey)) {
            $svnUrl = sprintf($formatOfSvnUrl, $projectKey);
        }

        return $svnUrl;
    }

    /**
     * Converted to a URL of project top
     *
     * @param String $projectKey The project key
     * @return String|null The URL of project, NULL if the key is empty.
     */
    private function toProjectUrl($projectKey) {
        $formatOfTopUrl = Configure::read('Backlog.formatOfTopUrl');  

        $projectUrl = null;
        if (!empty($projectKey)) {
            $projectUrl = sprintf($formatOfTopUrl, $projectKey);
        }

        return $projectUrl;
    }

    /**
     * The Subversion exists in the project?
     *
     * @param String $url The subversion URL of project
     * @return Boolean True if it exists
     */
    public function existsSubversion($url) {
        $userName = Configure::read('Backlog.userName');
        $password = Configure::read('Backlog.password');

        $httpSocket = new HttpSocket();
        $httpSocket->configAuth('Basic', $userName, $password);

        $response  = $httpSocket->get($url);
        $existsSvn = $response->isOk();

        return $existsSvn;
    }
}

