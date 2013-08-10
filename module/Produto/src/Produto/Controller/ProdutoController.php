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


}
