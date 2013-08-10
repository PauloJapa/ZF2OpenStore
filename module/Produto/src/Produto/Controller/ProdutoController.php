<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Produto\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Produto\Form\ProdutoForm;
use Produto\Model\Produto;

class ProdutoController extends AbstractActionController
{
    protected $produtoTable;
    
    public function indexAction()
    {
        return new ViewModel(array(
            'produtos' => $this->getProdutoTable()->fetchAll(),
        ));
    }

    public function editarAction()
    {
        return new ViewModel();
    }
    
    public function getProdutoTable()
    {
        if (!$this->produtoTable) {
            $sm = $this->getServiceLocator();
            $this->produtoTable = $sm->get('Produto\Model\ProdutoTable');
        }
        return $this->produtoTable;
    }

    public function addAction() {

    	$form = new ProdutoForm();

    	$request = $this->getRequest();

    	if ($request->isPost()) {
    		$produto = new Produto();    		
    		$form->setData($request->getPost());
			
			if ($form->isValid()) {
				$produto->exchangeArray($form->getData());
				$this->getProdutoTable()->save($produto);

				return $this->redirect()->toRoute('produto');
			}    		
    	}

    	return new ViewModel(array('form' => $form));

    }
}



