<?php

namespace App\Http\Controllers;

use App\Foundation\Redirect\RedirectInterface;
use App\Foundation\Validation\ValidatorInterface;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /** @var \App\Foundation\Validation\ValidatorInterface */
    protected $validator;

    /** @var \App\Foundation\Redirect\RedirectInterface */
    protected $redirect;

    /**
     * Controller constructor.
     *
     * @param \App\Foundation\Validation\ValidatorInterface $validator
     * @param \App\Foundation\Redirect\RedirectInterface $redirect
     */
    public function __construct(ValidatorInterface $validator, RedirectInterface $redirect)
    {
        $this->validator = $validator;
        $this->redirect = $redirect;
    }
}
