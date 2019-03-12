<?php
declare(strict_types=1);

namespace App\Foundation\Validation;

interface ValidatorInterface
{
    /**
     * Validates the data according to rules.
     *
     * @param mixed[] $data
     * @param mixed[] $rules
     *
     * @return mixed[]
     */
    public function validate(array $data, array $rules): array;
}
