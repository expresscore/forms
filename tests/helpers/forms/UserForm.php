<?php
namespace test\forms\helpers\forms;

use expresscore\forms\Form;
use expresscore\forms\types\DateTimeType;
use expresscore\forms\types\PasswordType;
use expresscore\forms\types\TextType;

class UserForm extends Form {

    public function __construct(object $entity = null)
    {
        parent::__construct($entity);

        $this
            ->addField(
                'login',
                TextType::class,
                [
                    'label' => 'Login',
                ]
            )
            ->addField(
                'password',
                PasswordType::class,
                [
                    'label' => 'Hasło',
                    'transform' => function($value) {
                        return md5($value);
                    }
                ]
            )
            ->addField(
                'lastLogin',
                DateTimeType::class,
                [
                    'label' => 'Data ostatniego logowania'
                ]
            )
        ;
    }
}