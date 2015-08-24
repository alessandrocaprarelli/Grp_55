<?php

class TecnicoController extends Zend_Controller_Action
{
    protected $_logger;
    protected $_authService;
    protected $_tecModel;

    public function init()
    {
        $this->_helper->layout->setLayout('admin');
        $this->_logger = Zend_Registry::get('log');
        $this->_tecModel = new Application_Model_Tec();
        $this->_authService = new Application_Service_Auth();
    }

    public function indexAction()
    {

    }

    public function viewstaticAction () {
        $page = $this->_getParam('staticPage');
        $this->render($page);
    }

    //Cancella l'identità e poi reindirizza all'azione index del controller public
    public function logoutAction()
    {
        $this->_authService->clear();
        return $this->_helper->redirector('index', 'public');
    }
}