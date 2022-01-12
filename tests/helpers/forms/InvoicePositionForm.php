<?php
namespace test\forms\helpers\forms;

use DateTime;
use expresscore\forms\Form;
use expresscore\forms\FormError;
use expresscore\forms\types\DateTimeType;
use expresscore\forms\types\FloatType;
use expresscore\forms\types\TextType;

class InvoicePositionForm extends Form {

    public function __construct(object $entity = null, array $options = [])
    {
        parent::__construct($entity, $options);

        $this
            ->addField(
                'name',
                TextType::class,
                [
                    'label' => 'Nazwa produktu',
                ]
            )
            ->addField(
                'quantity',
                TextType::class,
                [
                    'label' => 'Ilość'
                ]
            )
            ->addField(
                'sendDate',
                DateTimeType::class,
                [
                    'label' => 'Data wysyłki',
                    'nullable' => true,
                    'validator' => function($value) {
                        $formError = null;
                        if (trim($value) != '') {
                            $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $value);
                            $dateTimeInPast = new DateTime();
                            $dateTimeInPast->modify('-1 month');

                            if ($dateTime > $dateTimeInPast) {
                                $formError = new FormError();
                                $formError->setCurrentValue($value);
                                $formError->setErrorMessage('Data nie może być późniejsza niż ' . $dateTimeInPast->format('Y-m-d H:i:s'));
                            }
                        }

                        return $formError;
                    }
                ]
            )
            ->addField(
                'price',
                FloatType::class,
                [
                    'label' => 'Cena',
                    'nullable' => false,
                ]
            )
        ;
    }
}