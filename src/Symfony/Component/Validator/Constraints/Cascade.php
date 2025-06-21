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
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;

/**
 * Validates a whole class, including nested objects in properties.
 *
 * @author Jules Pietri <jules@heahprod.com>
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class Cascade extends Constraint
{
    public array $exclude = [];

    /**
     * @param non-empty-string[]|non-empty-string|array<string,mixed>|null $exclude Properties excluded from validation
     * @param array<string,mixed>|null                                     $options
     */
    #[HasNamedArguments]
    public function __construct(array|string|null $exclude = null, ?array $options = null)
    {
        if (null !== $exclude) {
            $exclude = array_flip((array) $exclude);
        }

        parent::__construct(null, null, null);

        $this->exclude = $exclude ?? $this->exclude;
    }

    public function getTargets(): string|array
    {
        return self::CLASS_CONSTRAINT;
    }
}
