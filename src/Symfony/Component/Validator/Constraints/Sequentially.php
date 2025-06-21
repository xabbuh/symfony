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
 * Use this constraint to sequentially validate nested constraints.
 * Validation for the nested constraints collection will stop at first violation.
 *
 * @author Maxime Steinhausser <maxime.steinhausser@gmail.com>
 */
#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class Sequentially extends Composite
{
    public array|Constraint $constraints = [];

    /**
     * @param Constraint[]|array<string,mixed>|null $constraints An array of validation constraints
     * @param string[]|null                         $groups
     */
    #[HasNamedArguments]
    public function __construct(array|Constraint $constraints = [], ?array $groups = null, mixed $payload = null)
    {
        $this->constraints = $constraints;

        parent::__construct($options ?? null, $groups, $payload);
    }

    protected function getCompositeOption(): string
    {
        return 'constraints';
    }

    public function getTargets(): string|array
    {
        return [self::CLASS_CONSTRAINT, self::PROPERTY_CONSTRAINT];
    }
}
