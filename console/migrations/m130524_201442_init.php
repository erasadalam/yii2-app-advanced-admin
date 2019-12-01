<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => 'user',
            'auth_key' => 'XuBYtHFVsxLC12UGykSj1L3Jd6USBzl5',
            'password_hash' => '$2y$13$chQFYrewaTNDpFEeqjQSZeGAE5R3tHwvdPkaaEqQR/SLe5dsCqfgy',
            'password_reset_token' => '',
            'email' => 'user@xyz.com',

            'status' => 10,
            'created_at' => '1575197611',
            'updated_at' => '1575197611',
        ]);

        $this->createTable('{{%admin}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('{{%admin}}', [
            'id' => 1,
            'username' => 'admin',
            'auth_key' => 'XuBYtHFVsxLC12UGykSj1L3Jd6USBzl5',
            'password_hash' => '$2y$13$chQFYrewaTNDpFEeqjQSZeGAE5R3tHwvdPkaaEqQR/SLe5dsCqfgy',
            'password_reset_token' => '',
            'email' => 'admin@xyz.com',

            'status' => 10,
            'created_at' => '1575197611',
            'updated_at' => '1575197611',
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
