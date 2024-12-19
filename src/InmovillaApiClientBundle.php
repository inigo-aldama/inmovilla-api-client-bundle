<?php

namespace Inmovilla\ApiClientBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Inmovilla\ApiClientBundle\DependencyInjection\InmovillaExtension;

class InmovillaApiClientBundle extends Bundle
{
    public function getContainerExtension(): ?InmovillaExtension
    {
        if (null === $this->extension) {
            $this->extension = new InmovillaExtension();
        }

        return $this->extension;
    }
}