<?php 

namespace Produto\Form;

use Zend\InputFilter\InputFilter;


class ProdutoFilter extends InputFilter{


	public function __construct() {
		$this->add(array(
			'name' => 'nome', 
			'required' => true,
			'filters' => array(
				array('name' => 'StripTags'),
				array('name' => 'StripTrim'),
			),
			'validators' => array(
				'name' => 'NotEmpty', 'options' => array(
					'messages' => array('isEmpty' => 'O nome do produto não pode estar vazio'),
				)),
		));

	}


}
