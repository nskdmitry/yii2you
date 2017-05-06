<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hotel".
 *
 * @property integer $id
 * @property string $name
 * @property integer $id_country
 * @property integer $rate
 *
 * @property Country $idCountry
 */
class Hotel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id_country', 'rate'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_country'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['id_country' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id_country' => 'Id Country',
            'rate' => 'Rate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'id_country']);
    }
}
