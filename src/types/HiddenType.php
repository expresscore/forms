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

class HiddenType implements SimpleFieldTypeInterface {

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
        return 'hiddenType';
    }

    public function validate($data, bool $nullable) : ?FormError
    {
        return null;
    }
}
