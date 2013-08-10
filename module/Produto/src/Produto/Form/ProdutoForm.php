<?php

namespace Produto\Form;

use Zend\Form\Form;

class ProdutoForm extends Form
{

    public function __construct()
    {
        //nome, descrição, valor

        parent::__construct('produto', array());


        $this->setInputFilter(new ProdutoFilter());

        // defini o metodo de envio do form
        $this->setAttribute('method', 'post');

        $this->add(
            array(
                'name'    => 'nome',
                'type'    => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'Nome do produto',
                ),
            )
        );

        $this->add(
            array(
                'name'    => 'descricao',
                'type'    => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'Descricao',
                ),
            )
        );

        $this->add(
            array(
                'name'       => 'cadastrar',
                'type'       => 'Zend\Form\Element\Submit',
                'attributes' => array(
                    'value' => 'Enviar',
                    'class' => 'btn btn-primary',
                ),
            )
        );
    }

}


