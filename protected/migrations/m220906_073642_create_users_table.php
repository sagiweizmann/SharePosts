<?php

class m220906_073642_create_users_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('users', array(
            'id' => 'pk',
            'title' => 'string NOT NULL',
            'content' => 'text', 
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