<?php

namespace App\Http\Controllers;

use App\Foundation\Redirect\RedirectInterface;
use App\Foundation\Validation\ValidatorInterface;
use App\User;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /** @var \App\Foundation\Validation\ValidatorInterface */
    protected $validator;

    /** @var \App\Foundation\Redirect\RedirectInterface */
    protected $redirect;

    /** @var \Illuminate\Contracts\Container\Container */
    protected $container;

    /** @var \App\User */
    protected $authUser = null;

    /**
     * Controller constructor.
     *
     * @param \App\Foundation\Validation\ValidatorInterface $validator
     * @param \App\Foundation\Redirect\RedirectInterface $redirect
     */
    public function __construct(ValidatorInterface $validator, RedirectInterface $redirect, Container $container)
    {
        $this->validator = $validator;
        $this->redirect = $redirect;
        $this->container = $container;
    }

    /**
     * Get authenticated user.
     *
     * @return null|\App\User
     */
    public function getAuthUser(): User
    {
        if ($this->authUser !== null) {
            return $this->authUser;
        }

        /** @var \Illuminate\Contracts\Auth\Factory $authFactory */
        $authFactory = $this->container->make(Factory::class);

        return $this->authUser = $authFactory->guard()->user();
    }
}
