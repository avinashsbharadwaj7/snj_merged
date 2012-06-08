<?php
class IrRssireading extends AppModel {
    var $name = 'IrRssireading';
    	var $belongsTo = array(
		'IrModule' => array(
			'className' => 'IrModule',
			'foreignKey' => 'irmodule_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        	var $validate = array(		
		'sh_alpha' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		),
		'sh_beta' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		),
		'sh_gamma' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		),
		'sh_alpha_antennasystemalarm' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		),
		'customer' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		),
		'sh_alpha_rssivalue_acceptable' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		),
		'sh_alpha_tma' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		),
		'sh_beta_antennasystemalarm' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		),
		'sh_beta_rssivalue_acceptable' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		),
		'sh_beta_rssivalue_acceptable' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		),
		'sh_beta_tma' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		),
		'sh_gamma_antennasystemalarm' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		),
		'sh_gamma_rssivalue_acceptable' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		),
		'sh_gamma_tma' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty',
			)
		)
                    
);

}