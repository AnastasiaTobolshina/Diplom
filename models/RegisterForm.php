<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Role;
use yii\helpers\VarDumper;

/**
 * RegisterForm is the model behind the Register form.
 */
class RegisterForm extends Model
{
    public string $name = '';
    public string $surname = '';
    public string $login = '';
    public string $email = '';
    public string $phone = '';
    public string $password = '';



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'surname', 'login', 'email', 'phone', 'password'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'login' => 'Логин',
            'email' => 'Адрес электронной почты',
            'phone' => 'Номер телефона',
            'password' => 'Пароль',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function userRegister(): object|false
    {
        if($this->validate()){
            $user = new User();
            $user->attributes = $this->attributes;
            $user->auth_key = Yii::$app->security->generateRandomstring();
            $user->password = Yii::$app->security->generatePasswordHash($user->password);
            $user->role_id = Role::getRoleId('user');
            if(!$user->save()){
                VarDumper::dump($user->errors, 10, true); die;
            }

        }
        return $user ?? false;
    }
}
