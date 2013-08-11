<?php

namespace Produto\Form;

use Zend\Form\Form;

class ProdutoForm extends Form
{

    public function __construct(){

        parent::__construct('produto', array());

        $this->setInputFilter(new ProdutoFilter());

        $this->setAttribute('method', 'post');
        $this->setAttribute('class','frmProdutos');

        $this->add(
            array(
                'name'    => 'nome',
                'type'    => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'Nome',
                ),
            )
        );
        
        $this->add(
            array(
                'name'    => 'valor',
                'type'    => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'Valor R$',
                ),
            )
        );

        $this->add(
            array(
                'name'    => 'descricao',
                'type'    => 'Zend\Form\Element\Textarea',
                'options' => array(
                    'label' => 'Descricao',
                ),
            )
        );

        $this->add(
            array(
                'type'  =>  'Zend\Form\Element\Radio',
                'name'  =>  'ativo',
                'options' => array(
                    'label' => 'Status',
                    'value_options' => array(
                        '0' => 'Inativo',
                        '1' => 'Ativo',
                    ),
                ),
            )
        );


 // $radio = new Element\Radio('gender');
 //     $radio->setLabel('What is your gender ?');
 //     $radio->setValueOptions(array(
 //             array(
 //                     '0' => 'Female',
 //                     '1' => 'Male',
 //             )
 //     ));







        $this->add(
            array(
                'type'  => 'Zend\Form\Element\Csrf',
                'name'  => 'security',
            )
        );

        $this->add(
            array(
                'name'       => 'cadastrar',
                'type'       => 'Zend\Form\Element\Submit',
                'attributes' => array(
                    'value' => 'Cadastrar',
                    'class' => 'btn btn-primary',
                ),
            )
        );
    }


}


