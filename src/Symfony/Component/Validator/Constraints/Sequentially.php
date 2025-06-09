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
    public function __construct(mixed $constraints = null, ?array $groups = null, mixed $payload = null)
    {
        $options = null;
        if (\is_array($constraints) && !array_is_list($constraints)) {
            trigger_deprecation('symfony/validator', '7.3', 'Passing an array of options to configure the "%s" constraint is deprecated, use named arguments instead.', static::class);
            $options = $constraints;
        } else {
            $this->constraints = $constraints;
        }

        parent::__construct($options, $groups, $payload);

        $this->constraints = $constraints ?? $this->constraints;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function getDefaultOption(): ?string
    {
        return 'constraints';
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function getRequiredOptions(): array
    {
        return ['constraints'];
    }

    protected function getCompositeOption(): string
    {
        return 'constraints';
    }

    public function getTargets(): string|array
    {
        return [self::CLASS_CONSTRAINT, self::PROPERTY_CONSTRAINT];
    }

    private static function isConstraintsOption(mixed $value): bool
    {
        if (!\is_array($value)) {
            return true;
        }

        if (!array_is_list($value)) {
            return false;
        }

        foreach ($value as $constraint) {
            if (!$constraint instanceof Constraint) {
                return false;
            }
        }

        return false;
    }
}
