<?php
declare(strict_types=1);

namespace App\Foundation\Validation;

use Illuminate\Contracts\Validation\Factory;

class Validator implements ValidatorInterface
{
    /** @var \Illuminate\Contracts\Validation\Factory */
    private $validatorFactory;

    /**
     * Validator constructor.
     *
     * @param \Illuminate\Contracts\Validation\Factory $validatorFactory
     */
    public function __construct(Factory $validatorFactory)
    {
        $this->validatorFactory = $validatorFactory;
    }

    /**
     * Validates the data according to rules.
     *
     * @param mixed[] $data
     * @param mixed[] $rules
     *
     * @return mixed[]
     */
    public function validate(array $data, array $rules): array
    {
        return $this->validatorFactory->make($data, $rules)->validate();
    }
}
