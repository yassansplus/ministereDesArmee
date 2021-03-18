<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('phone_number', [$this, 'phoneNumber']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            // new TwigFunction('function_name', [$this, 'doSomething']),
        ];
    }

    public function phoneNumber(string $phoneNumber)
    {
        $final = '';
        for ($i = 0; $i < strlen($phoneNumber); $i++) {
            $final .= ($i % 2 ? $phoneNumber[$i] : ' ' . $phoneNumber[$i]);
        }
        return $final;
    }
}
