<?php
/**
 * This file is part of the ExpressCore package.
 *
 * (c) Marcin Stodulski <marcin.stodulski@devsprint.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace expresscore\forms\types;

use DateTime;
use expresscore\forms\FormError;

class DateType implements SimpleFieldTypeInterface {

    //metoda zamieniająca wartość z formularza na wartość dla encji
    public function transform($data) : ?DateTime
    {
        if (trim($data) !== '') {
            return DateTime::createFromFormat('Y-m-d', $data);
        } else {
            return null;
        }
    }

    //metoda zamieniająca wartość z encji na wartość z formularza
    public function reverse($data) : ?string
    {
        if ($data instanceof DateTime) {
            return $data->format('Y-m-d');
        } else {
            return $data;
        }
    }

    public static function getAlias(): string
    {
        return 'dateType';
    }

    public function validate($data, bool $nullable) : ?FormError
    {
        $formError = null;

        if (!$nullable && (trim($data) == '')) {
            $formError = new FormError();
            $formError->setCurrentValue($data);
            $formError->setErrorMessage('Value cannot be empty.');
        } elseif (trim($data) != '') {
            if (DateTime::createFromFormat('Y-m-d', $data) === false) {
                $formError = new FormError();
                $formError->setCurrentValue($data);
                $formError->setErrorMessage('Value is not valid.');

                return $formError;
            }
        }

        return $formError;
    }
}
