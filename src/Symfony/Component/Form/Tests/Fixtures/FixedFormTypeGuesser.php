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
use Symfony\Component\Form\Guess\TypeGuess;
use Symfony\Component\Form\Guess\ValueGuess;

class FixedFormTypeGuesser implements FormTypeGuesserInterface
{
    private $class;
    private $property;
    private $typeGuess;
    private $requiredGuess;
    private $maxLengthGuess;
    private $patternGuess;

    public static function createTypeGuesser($class, $property, TypeGuess $typeGuess)
    {
        $typeGuesser = new FixedFormTypeGuesser();
        $typeGuesser->class = $class;
        $typeGuesser->property = $property;
        $typeGuesser->typeGuess = $typeGuess;

        return $typeGuesser;
    }

    public static function createRequiredGuesser($class, $property, ValueGuess $requiredGuess)
    {
        $typeGuesser = new FixedFormTypeGuesser();
        $typeGuesser->class = $class;
        $typeGuesser->property = $property;
        $typeGuesser->requiredGuess = $requiredGuess;

        return $typeGuesser;
    }

    public static function createMaxLengthGuesser($class, $property, ValueGuess $maxLengthGuess)
    {
        $typeGuesser = new FixedFormTypeGuesser();
        $typeGuesser->class = $class;
        $typeGuesser->property = $property;
        $typeGuesser->maxLengthGuess = $maxLengthGuess;

        return $typeGuesser;
    }

    public static function createPatternGuesser($class, $property, ValueGuess $patternGuess)
    {
        $typeGuesser = new FixedFormTypeGuesser();
        $typeGuesser->class = $class;
        $typeGuesser->property = $property;
        $typeGuesser->patternGuess = $patternGuess;

        return $typeGuesser;
    }

    public function guessType($class, $property)
    {
        if ($this->class === $class && $this->property === $property) {
            return $this->typeGuess;
        }

        return null;
    }

    public function guessRequired($class, $property)
    {
        if ($this->class === $class && $this->property === $property) {
            return $this->requiredGuess;
        }

        return null;
    }

    public function guessMaxLength($class, $property)
    {
        if ($this->class === $class && $this->property === $property) {
            return $this->maxLengthGuess;
        }

        return null;
    }

    public function guessPattern($class, $property)
    {
        if ($this->class === $class && $this->property === $property) {
            return $this->patternGuess;
        }

        return null;
    }
}
