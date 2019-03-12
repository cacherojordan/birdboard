<?php
declare(strict_types=1);

namespace App\Foundation\Redirect;

interface RedirectInterface
{
    /**
     * Create a new redirect response to the given path.
     *
     * @param string $path
     * @param int $status
     * @param mixed[] $headers
     * @param null|bool $secure
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function to($path, $status = 302, $headers = [], $secure = null);
}