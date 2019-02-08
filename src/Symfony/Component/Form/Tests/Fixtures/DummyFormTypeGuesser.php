<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Tests\Fixtures;

use Symfony\Component\Form\FormTypeGuesserInterface;

class DummyFormTypeGuesser implements FormTypeGuesserInterface
{
    public function guessType($class, $property)
    {
    }

    public function guessRequired($class, $property)
    {
    }

    public function guessMaxLength($class, $property)
    {
    }

    public function guessPattern($class, $property)
    {
    }
}
