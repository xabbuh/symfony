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
 * When applied to an array (or Traversable object), this constraint allows you to apply
 * a collection of constraints to each element of the array.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class All extends Composite
{
    public array|Constraint $constraints = [];

    /**
     * @param array<Constraint>|array<string,mixed>|Constraint|null $constraints
     * @param string[]|null                                         $groups
     */
    #[HasNamedArguments]
    public function __construct(array|Constraint $constraints = [], ?array $groups = null, mixed $payload = null)
    {
        $this->constraints = $constraints;

        parent::__construct(null, $groups, $payload);
    }

    protected function getCompositeOption(): string
    {
        return 'constraints';
    }
}
