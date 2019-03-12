<?php
declare(strict_types=1);

namespace App\Foundation\Redirect;

use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Routing\UrlGenerator;

final class Redirect implements RedirectInterface
{
    /** @var \Illuminate\Contracts\Routing\UrlGenerator */
    private $urlGenerator;

    /**
     * Redirect constructor.
     * @param \Illuminate\Contracts\Routing\UrlGenerator $urlGenerator
     */
    public function __construct(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

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
    public function to($path, $status = 302, $headers = [], $secure = null)
    {
        $path = $this->urlGenerator->to($path, []);

        return new RedirectResponse($path, $status, $headers);
    }
}