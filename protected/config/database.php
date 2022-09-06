<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',	
	'connectionString' => 'mysql:host=127.0.0.1;dbname=SharePosts;',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '1234',
	'charset' => 'utf8',
);