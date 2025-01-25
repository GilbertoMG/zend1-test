<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{protected function _initViewHelpers()
	{
		// // Cria uma instância de Zend_View
		// $view = new Zend_View();
	
		// // Adiciona o caminho padrão dos helpers do Zend Framework
		// $view->addHelperPath('Zend/View/Helper', 'Zend_View_Helper');
	
		// // Adiciona o caminho para helpers personalizados
		// $view->addHelperPath(APPLICATION_PATH . '/views/helpers', 'Application_View_Helper');
	
		// // Configura o view renderer para usar essa view
		// $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
		// $viewRenderer->setView($view);
	}
}