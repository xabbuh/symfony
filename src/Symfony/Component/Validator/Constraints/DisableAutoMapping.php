<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Validator\Constraints;

use Symfony\Component\Validator\Attribute\HasNamedArguments;
use Symfony\Component\Validator\Constraint;

/**
 * Disables auto mapping.
 *
 * Using the attribute on a property has higher precedence than using it on a class,
 * which has higher precedence than any configuration that might be defined outside the class.
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::TARGET_CLASS)]
class DisableAutoMapping extends Constraint
{
    /**
     * @param array<string,mixed>|null $options
     */
    #[HasNamedArguments]
    public function __construct(?array $options = null, mixed $payload = null)
    {
        parent::__construct(null, null, $payload);
    }

    public function getTargets(): string|array
    {
        return [self::PROPERTY_CONSTRAINT, self::CLASS_CONSTRAINT];
    }
}
