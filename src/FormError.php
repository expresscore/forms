<?php
/**
 * This file is part of the ExpressCore package.
 *
 * (c) Marcin Stodulski <marcin.stodulski@devsprint.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace expresscore\forms;

class FormError
{
    private ?string $errorMessage;
    private mixed $currentValue;

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function setErrorMessage(string $errorMessage): void
    {
        $this->errorMessage = $errorMessage;
    }

    public function setCurrentValue(mixed $currentValue): void
    {
        $this->currentValue = $currentValue;
    }

    public function getCurrentValue(): mixed
    {
        return $this->currentValue;
    }

}