<?php
namespace test\forms\helpers\forms;

use test\forms\helpers\entities\Customer;
use test\forms\helpers\entities\InvoiceCategory;
use test\forms\helpers\entities\InvoicePosition;
use test\forms\helpers\entities\WarehouseDocument;
use test\forms\helpers\services\FileService;
use Exception;
use expresscore\forms\Form;
use expresscore\forms\types\CheckboxType;
use expresscore\forms\types\CollectionType;
use expresscore\forms\types\DateTimeType;
use expresscore\forms\types\FileType;
use expresscore\forms\types\HiddenType;
use expresscore\forms\types\IntegerType;
use expresscore\forms\types\MultiSelectType;
use expresscore\forms\types\RadioButtonType;
use expresscore\forms\types\SelectType;
use expresscore\forms\types\SubmitType;
use expresscore\forms\types\TextAreaType;
use expresscore\forms\types\TextType;

class InvoiceForm extends Form {

    /** @throws Exception */
    public function __construct(object $entity = null, array $options = [])
    {
        parent::__construct($entity, $options);

        $this
            ->addField(
                'invoiceNumber',
                TextType::class,
                [
                    'label' => 'Numer faktury',
                ]
            )
            ->addField(
                'dateTime',
                DateTimeType::class,
                [
                    'label' => 'Data i czas wystawienia',
                    'template' => 'exampleDateField.tpl'
                ]
            )
            ->addField(
                'positions',
                CollectionType::class,
                [
                    'class' => InvoicePositionForm::class,
                    'entityClass' => InvoicePosition::class,
                    'label' => 'Pozycje',
                    'template' => 'positions.tpl'
                ]
            )
            ->addField(
                'customer',
                CustomerForm::class,
                [
                    'class' => Customer::class,
                    'label' => 'Kontrahent'
                ]
            )
            ->addField(
                'warehouseDocuments',
                MultiSelectType::class,
                [
                    'class' => WarehouseDocument::class,
                    'label' => 'Dokumenty magazynowe',
                ]
            )
            ->addField(
                'categories',
                CheckboxType::class,
                [
                    'class' => InvoiceCategory::class,
                    'label' => 'Kategorie faktury',
                ]
            )
            ->addField(
                'paymentDays',
                IntegerType::class,
                [
                    'label' => 'Dni na płatność',
                ]
            )
            ->addField(
                'notices',
                TextAreaType::class,
                [
                    'label' => 'Notatki',
                ]
            )
            ->addField(
                'payer',
                SelectType::class,
                [
                    'label' => 'Płatnik',
                    'class' => Customer::class,
                ]
            )
            ->addField(
                'mainCategory',
                RadioButtonType::class,
                [
                    'label' => 'Kategoria główna',
                    'class' => InvoiceCategory::class,
                    'choices' => function() {
                        $choices[222] = 'Kategoria 1';
                        $choices[444] = 'Kategoria 3';

                        return $choices;
                    },
                ]
            )
            ->addField(
                'files',
                FileType::class,
                [
                    'label' => 'Pliki',
                    'nullable' => true,
                    'transform' => function($data) {
                        return FileService::uploadFilesAndCreateFilesArray($this->entity, $data);
                    }
                ]
            )
            ->addField(
                'mysteryValue',
                HiddenType::class,
                [
                    'label' => 'Tajemnicza wartość',
                    'nullable' => true,
                ]
            )
            ->addField(
                'submit',
                SubmitType::class,
                [
                    'label' => 'Zatwierdź formularz',
                    'template' => 'customSubmit.tpl'
                ]
            )
        ;
    }
}
