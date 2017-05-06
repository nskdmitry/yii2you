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
        
        $this->insert('hotel', ['name'=>'Маринс Парк', 'id_country'=>1, 'rate'=>4]);
        $this->insert('hotel', ['name'=>'Гранд отель "Жемчужина"', 'id_country'=>1, 'rate'=>3]);
        $this->insert('hotel', ['name'=>'Имеретенский отель', 'id_country'=>1, 'rate'=>4]);
        $this->insert('hotel', ['name'=>'Baiyoko Sky Hotel', 'id_country'=>2, 'rate'=>4]);
        $this->insert('hotel', ['name'=>'Royal Cliff Beach Resort', 'id_country'=>2, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'Pullman Phuket Arcadia', 'id_country'=>2, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'The Desert Rose', 'id_country'=>3, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'Sharm Plaza', 'id_country'=>3, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'Sunrise Holidays', 'id_country'=>3, 'rate'=>5]);
        $this->insert('hotel', ['name'=>'Six Corners Resort', 'id_country'=>3, 'rate'=>3]);
        $this->insert('hotel', ['name'=>'Sand Sea Resort Krabi', 'id_country'=>2, 'rate'=>3]);
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
