<?php

class m220906_130653_create_posts_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('posts', array(
            'id' => 'pk AUTO_INCREMENT',
            'user_id' => 'int NOT NULL',
            'title' => 'string NOT NULL',
			'body' => 'text NOT NULL',
			'created_at' => 'datetime DEFAULT CURRENT_TIMESTAMP',
        ));
	}

	public function down()
	{
		echo "m220906_130653_create_posts_table does not support migration down.\n";
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