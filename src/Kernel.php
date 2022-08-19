<?php

namespace App;

use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use ConnectHolland\CookieConsentBundle\CHCookieConsentBundle;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;
}
