<?php

use yii\db\Migration;

/**
 * Handles the creation of table `coutry`.
 */
class m170504_033313_create_country_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('country', [
            'id' => $this->primaryKey(),
            'name' => $this->string(40)->notNull()
        ]);
        
        $this->insert('country', ['name'=>'Russian Federation']);
        $this->insert('country', ['name'=>'Thailand']);
        $this->insert('country', ['name'=>'Egypt']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('coutry');
    }
}
