<?php

namespace app\usersupervisor\models;

use Yii;

/**
 * This is the model class for table "accounts".
 *
 * @property string $id
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $lastname
 * @property integer $sexfemale
 * @property string $burndate
 * @property integer $role
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'name', 'sexfemale', 'role'], 'required'],
            [['sexfemale', 'role'], 'integer'],
            [['burndate'], 'safe'],
            [['login', 'name'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 64],
            [['lastname'], 'string', 'max' => 44],
            [['login'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'sexfemale' => 'Sexfemale',
            'burndate' => 'Burndate',
            'role' => 'Role',
        ];
    }
}
