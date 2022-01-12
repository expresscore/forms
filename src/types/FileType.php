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

class FileType implements FileTypeInterface {

    public function transform($data) : mixed
    {
        return $data;
    }

    public function reverse($data) : mixed
    {
        return $data;
    }

    public static function getAlias(): string
    {
        return 'fileType';
    }

    public function validate($data, bool $nullable) : ?FormError
    {
        if (($data === null) && ($nullable === false)) {
            $formError = new FormError();
            $formError->setCurrentValue($data);
            $formError->setErrorMessage('You must select at least one file.');

            return $formError;
        }

        return null;
    }
}
