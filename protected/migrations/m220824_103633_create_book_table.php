<?php

class m220824_103633_create_book_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('book', array(
            'id'           => 'pk',
            'title'        => 'string NOT NULL',
            'author'       => 'string NOT NULL',
            'iban'         => 'smallint',
            'release_year' => 'smallint',
            'cover_image'  => 'string NOT NULL'
        ));
	}

	public function down()
	{
		echo "m220824_103633_create_book_table does not support migration down.\n";
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