<?php
return array(
	'params'=>array(
		// application-level parameters that can be accessed
		// using Yii::app()->params['paramName']
		'auth_source' => 'BASIC', // Options are BASIC or LDAP.
		// this is used in contact page
		'adminEmail' => 'webmaster@example.com',
		'ldap_server' => '',
		'ldap_port' => '',
		'ldap_admin_dn' => 'uid=admin,ou=system',
		'ldap_password' => '',
		'ldap_dn' => 'ou=people,o=openeyes',
		'adminEmail'=>'webmaster@example.com',
		// if 'yes' or not present, patient details are pseudonymised.	this must be present and set to 'no' to store real patient data
		'pseudonymise_patient_details' => 'yes'
	)
);