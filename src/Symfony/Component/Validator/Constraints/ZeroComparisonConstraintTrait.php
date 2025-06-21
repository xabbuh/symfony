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

/**
 * @internal
 *
 * @author Jan Schädlich <jan.schaedlich@sensiolabs.de>
 * @author Alexander M. Turek <me@derrabus.de>
 */
trait ZeroComparisonConstraintTrait
{
    #[HasNamedArguments]
    public function __construct(?array $options = null, ?string $message = null, ?array $groups = null, mixed $payload = null)
    {
        parent::__construct(0, null, $message, $groups, $payload);
    }

    public function validatedBy(): string
    {
        return parent::class.'Validator';
    }
}
