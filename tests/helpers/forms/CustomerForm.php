<?php
namespace test\forms\helpers\forms;

use test\forms\helpers\entities\User;
use Exception;
use expresscore\forms\Form;
use expresscore\forms\types\DateTimeType;
use expresscore\forms\types\TextType;

class CustomerForm extends Form {

    /** @throws Exception */
    public function __construct(object $entity = null)
    {
        parent::__construct($entity);

        $this
            ->addField(
                'name',
                TextType::class,
                [
                    'label' => 'Nazwa kontrahenta',
                ]
            )
            ->addField(
                'birthDate',
                DateTimeType::class,
                [
                    'label' => 'Data urodzenia'
                ]
            )
            ->addField(
                'user',
                UserForm::class,
                [
                    'class' => User::class,
                    'label' => 'Użytkownik'
                ]
            )
        ;
    }
}