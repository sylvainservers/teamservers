<?php
App::uses('FormHelper', 'View/Helper');
class MyFormHelper extends FormHelper {

	public function create($model = null, $options = array()) {
		$defaultOptions = array(
			'class' => 'form-horizontal',
	        'inputDefaults' => array(
	    	'format' => array('before', 'label', 'between', 'input', 'error', 'after'), 
			'div' => 'control-group', 
	    	'label' => array('class' => 'control-label'),
	    	'between' => '<div class="controls">', 
	    	'after' => '</div>', 	   		
	    	'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'),
        )));
		
		if(!empty($options['inputDefaults'])) {
			$options = array_merge($defaultOptions['inputDefaults'], $options['inputDefaults']);
		} else {
			$options = array_merge($defaultOptions, $options);
		}
		return parent::create($model, $options);
	}
}