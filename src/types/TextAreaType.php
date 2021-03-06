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

use expresscore\forms\FormError;

class TextAreaType implements SimpleFieldTypeInterface {

    public function transform($data)
    {
        return $data;
    }

    public function reverse($data) : ?string
    {
        return $data;
    }

    public static function getAlias(): string
    {
        return 'textareaType';
    }

    public function validate($data, bool $nullable) : ?FormError
    {
        $formError = null;

        if (!$nullable && (trim($data) == '')) {
            $formError = new FormError();
            $formError->setCurrentValue($data);
            $formError->setErrorMessage('Value cannot be empty.');
        }

        return $formError;
    }
}
