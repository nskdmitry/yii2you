<?php

use yii\db\Migration;

/**
 * Handles the creation of table `hotel`.
 * Has foreign keys to the tables:
 *
 * - `country`
 */
class m170504_041922_create_hotel_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('hotel', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'id_country' => $this->integer()->defaultValue(1),
            'rate' => $this->integer(),
        ]);

        // creates index for column `id_country`
        $this->createIndex(
            'idx-hotel-id_country',
            'hotel',
            'id_country'
        );

        // add foreign key for table `country`
        $this->addForeignKey(
            'fk-hotel-id_country',
            'hotel',
            'id_country',
            'country',
            'id',
            'CASCADE'
        );
        
        $this->insert('hotel', ['name'=>'', 'id_country'=>1, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'', 'id_country'=>1, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'', 'id_country'=>1, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'', 'id_country'=>1, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'', 'id_country'=>1, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'', 'id_country'=>1, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'', 'id_country'=>1, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'', 'id_country'=>1, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'', 'id_country'=>1, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'', 'id_country'=>1, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'', 'id_country'=>1, 'rate'=>5]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `country`
        $this->dropForeignKey(
            'fk-hotel-id_country',
            'hotel'
        );

        // drops index for column `id_country`
        $this->dropIndex(
            'idx-hotel-id_country',
            'hotel'
        );

        $this->dropTable('hotel');
    }
}
