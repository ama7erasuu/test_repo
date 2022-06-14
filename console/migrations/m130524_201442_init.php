<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
      
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'author' => $this->string()->notNull(),
            'watchers' => $this->integer()->notNull(),
            'stargazers' => $this->integer()->notNull(),
            'link' => $this->string()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('project');
    }
}
