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

    public function editarAction(){
        $this->layout()->setVariables(array(
            'pageHeader' => 'Produtos',
            'subPageHeader' => 'Editar produto',
        ));

        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id): 
            return $this->redirect()->toRoute('produto/default', array('controller'=>'produto', 'action'=>'index'));
        endif;

        try{
            $produto = $this->getProdutoTable()->findBy($id);
        }catch(\Exception $ex){
            return $this->redirect()->toRoute('produto', array(
                'controller' => 'produto', 'action' => 'index'
            ));
        }

        return new ViewModel();
    }
    
    public function getProdutoTable()
    {
        if (!$this->produtoTable) {
            $sm = $this->getServiceLocator();
            $this->produtoTable = $sm->get('Produto\Model\ProdutoTable');            
        }
        
        $this->layout()->setVariables(array(
            'pageHeader' => 'Produtos',
            'subPageHeader' => 'Adicionar produto',
        ));

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

				return $this->redirect()->toRoute('produto', array('controller' => 'produto'));
			}    		
    	}

        $this->layout()->setVariables(array(
            'pageHeader' => 'Produtos',
            'subPageHeader' => 'Adicionar produto',
        ));

    	return array('form' => $form,'pageHeader'=>'Produtos');

    }
}



