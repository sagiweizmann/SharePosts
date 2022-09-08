<?php

class m220906_073642_create_users_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('users', array(
            'id' => 'pk AUTO_INCREMENT',
            'username' => 'string NOT NULL',
            'email' => 'string NOT NULL',
			'password' => 'string NOT NULL',
			'created_at' => 'datetime DEFAULT CURRENT_TIMESTAMP',
        ));
	}

	public function down()
	{
		echo "m220906_073642_create_users_table does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}