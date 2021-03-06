<?php

use yii\db\Migration;

/**
 * Class m200530_084913_user
 */
class m200530_084913_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'username' => $this->string()->notNull(),
            'auth_key' => $this->string(32),
            'email_confirm_token' => $this->string(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'type' => $this->smallInteger()->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'full_name' => $this->string()->notNull(),
            'email' => $this->string(),
            'discipline' => $this->string(),
            'competence' => $this->text(),
        ], $tableOptions);

        $this->createIndex('idx_user_username', '{{%user}}', 'username');
        $this->createIndex('idx_user_email', '{{%user}}', 'email');
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}