<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Validator\Tests\Constraints;

use Symfony\Component\Validator\Tests\Constraints\Fixtures\TypedDummy;

trait CompareWithNullValueAtPropertyAtTestTrait
{
    /**
     * @dataProvider provideComparisonsToNullValueAtPropertyPath
     */
    public function testCompareWithNullValueAtPropertyAt($dirtyValue, $dirtyValueAsString, $isValid)
    {
        $constraint = $this->createConstraint(['propertyPath' => 'value']);
        $constraint->message = 'Constraint Message';

        $object = new ComparisonTest_Class(null);
        $this->setObject($object);

        $this->validator->validate($dirtyValue, $constraint);

        if ($isValid) {
            $this->assertNoViolation();
        } else {
            $this->buildViolation('Constraint Message')
                ->setParameter('{{ value }}', $dirtyValueAsString)
                ->setParameter('{{ compared_value }}', 'null')
                ->setParameter('{{ compared_value_type }}', 'null')
                ->setParameter('{{ compared_value_path }}', 'value')
                ->setCode($this->getErrorCode())
                ->assertRaised();
        }
    }

    /**
     * @dataProvider provideComparisonsToNullValueAtPropertyPath
     */
    public function testCompareWithUninitializedPropertyAtPropertyPath($dirtyValue, $dirtyValueAsString, $isValid)
    {
        $this->setObject(new TypedDummy());

        $this->validator->validate($dirtyValue, $this->createConstraint([
            'message' => 'Constraint Message',
            'propertyPath' => 'value',
        ]));

        if ($isValid) {
            $this->assertNoViolation();
        } else {
            $this->buildViolation('Constraint Message')
                ->setParameter('{{ value }}', $dirtyValueAsString)
                ->setParameter('{{ compared_value }}', 'null')
                ->setParameter('{{ compared_value_type }}', 'null')
                ->setParameter('{{ compared_value_path }}', 'value')
                ->setCode($this->getErrorCode())
                ->assertRaised();
        }
    }

    abstract public static function provideComparisonsToNullValueAtPropertyPath();
}
