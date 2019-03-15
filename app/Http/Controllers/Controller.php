<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /** @var \Illuminate\Contracts\Auth\Factory */
    protected $authFactory;

    /** @var null|\App\User */
    protected $authUser = null;

    /**
     * Controller constructor.
     *
     * @param \Illuminate\Contracts\Auth\Factory $authFactory
     */
    public function __construct(AuthFactory $authFactory)
    {
        $this->authFactory = $authFactory;
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

        return $this->authUser = $this->authFactory->guard()->user() ?? null;
    }
}
