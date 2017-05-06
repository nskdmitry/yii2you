<?php

use yii\db\Migration;

/**
 * Handles the creation of table `accounts`.
 */
class m170504_054741_create_accounts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('accounts', [
            'id' => $this->primaryKey(),
            'login' => $this->string(30)->notNull(),
            'password' => $this->string(64),
            'name' => $this->string(30)->notNull(),
            'lastname' => $this->string(44),
            'sexfemale' => $this->integer(),
            'burndate' => $this->date(),
            'role' => $this->int(),
        ]);
        
        $this->insert('accounts', ['login'=>'admin',
                                   'password'=>'administrator',
                                   'name'=>'Фёдор',
                                   'lastname'=>'Ванин',
                                   'sexfemale'=>0,
                                   'burndate'=>time(),
                                   'role'=>100]);
        $this->insert('accounts', ['login'=>'ivanova',
                                   'password'=>'1234567890',
                                   'name'=>'Татьяна',
                                   'lastname'=>'Никитична',
                                   'sexfemale'=>1,
                                   'burndate'=>time(),
                                   'role'=>80]);
        $this->insert('accounts', ['login'=>'almazz',
                                   'password'=>'adamant',
                                   'name'=>'Валерий',
                                   'lastname'=>'Припин',
                                   'sexfemale'=>0,
                                   'burndate'=>time(),
                                   'role'=>10]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('accounts');
    }
}
