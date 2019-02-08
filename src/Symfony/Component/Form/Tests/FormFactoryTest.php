<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormFactoryBuilder;
use Symfony\Component\Form\Guess\Guess;
use Symfony\Component\Form\Guess\TypeGuess;
use Symfony\Component\Form\Guess\ValueGuess;
use Symfony\Component\Form\Tests\Fixtures\FixedFormTypeGuesser;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class FormFactoryTest extends TestCase
{
    public function testCreateNamedBuilderWithTypeName()
    {
        $options = ['a' => '1', 'b' => '2'];

        $builder = $this->createFormFactory()->createNamedBuilder('name', DummyType::class, null, $options);

        $this->assertSame('name', $builder->getName());
        $this->assertInstanceOf(DummyType::class, $builder->getType()->getInnerType());
        $this->assertSame('2', $builder->getOption('a'));
        $this->assertSame('3', $builder->getOption('b'));
    }

    public function testCreateNamedBuilderFillsDataOption()
    {
        $givenOptions = ['a' => '1', 'b' => '2'];
        $builder = $this->createFormFactory()->createNamedBuilder('name', DummyType::class, 'DATA', $givenOptions);

        $this->assertSame('DATA', $builder->getOption('data'));
    }

    public function testCreateNamedBuilderDoesNotOverrideExistingDataOption()
    {
        $options = ['a' => '1', 'b' => '2', 'data' => 'CUSTOM'];
        $builder = $this->createFormFactory()->createNamedBuilder('name', DummyType::class, 'DATA', $options);

        $this->assertSame('CUSTOM', $builder->getOption('data'));
    }

    /**
     * @expectedException        \Symfony\Component\Form\Exception\UnexpectedTypeException
     * @expectedExceptionMessage Expected argument of type "string", "stdClass" given
     */
    public function testCreateNamedBuilderThrowsUnderstandableException()
    {
        $factory = $this->createFormFactory();

        $factory->createNamedBuilder('name', new \stdClass());
    }

    /**
     * @expectedException        \Symfony\Component\Form\Exception\UnexpectedTypeException
     * @expectedExceptionMessage Expected argument of type "string", "stdClass" given
     */
    public function testCreateThrowsUnderstandableException()
    {
        $this->createFormFactory()->create(new \stdClass());
    }

    public function testCreateUsesBlockPrefixIfTypeGivenAsString()
    {
        $options = ['a' => '1', 'b' => '2'];
        $builder = $this->createFormFactory()->create(DummyType::class, null, $options);

        $this->assertSame('TYPE_PREFIX', $builder->getName());
    }

    public function testCreateBuilderForPropertyWithoutTypeGuesser()
    {
        $builder = $this->createFormFactory()->createBuilderForProperty('Application\Author', 'firstName');

        $this->assertInstanceOf(TextType::class, $builder->getType()->getInnerType());
    }

    public function testCreateBuilderForPropertyCreatesFormWithHighestConfidence()
    {
        $guesser1 = FixedFormTypeGuesser::createTypeGuesser('Application\Author', 'firstName', new TypeGuess(TextType::class, ['attr' => ['maxlength' => 10]], Guess::MEDIUM_CONFIDENCE));
        $guesser2 = FixedFormTypeGuesser::createTypeGuesser('Application\Author', 'firstName', new TypeGuess(PasswordType::class, ['attr' => ['maxlength' => 7]], Guess::HIGH_CONFIDENCE));

        $builder = $this->createFormFactory([$guesser1, $guesser2])->createBuilderForProperty('Application\Author', 'firstName');

        $this->assertInstanceOf(PasswordType::class, $builder->getType()->getInnerType());
        $this->assertSame(['maxlength' => 7], $builder->getOption('attr'));
    }

    public function testCreateBuilderCreatesTextFormIfNoGuess()
    {
        $builder = $this->createFormFactory([FixedFormTypeGuesser::createRequiredGuesser('Application\Author', 'firstName', new ValueGuess(true, Guess::HIGH_CONFIDENCE))])->createBuilderForProperty('Application\Author', 'firstName');

        $this->assertInstanceOf(TextType::class, $builder->getType()->getInnerType());
    }

    public function testOptionsCanBeOverridden()
    {
        $guesser1 = FixedFormTypeGuesser::createTypeGuesser('Application\Author', 'firstName', new TypeGuess(TextType::class, ['attr' => ['class' => 'foo', 'maxlength' => 10]], Guess::MEDIUM_CONFIDENCE));
        $builder = $this->createFormFactory([$guesser1])->createBuilderForProperty('Application\Author', 'firstName', null, ['attr' => ['maxlength' => 11]]);

        $this->assertSame(['class' => 'foo', 'maxlength' => 11], $builder->getOption('attr'));
    }

    public function testCreateBuilderUsesMaxLengthIfFound()
    {
        $guesser1 = FixedFormTypeGuesser::createMaxLengthGuesser('Application\Author', 'firstName', new ValueGuess(15, Guess::MEDIUM_CONFIDENCE));
        $guesser2 = FixedFormTypeGuesser::createMaxLengthGuesser('Application\Author', 'firstName', new ValueGuess(20, Guess::HIGH_CONFIDENCE));

        $builder = $this->createFormFactory([$guesser1, $guesser2])->createBuilderForProperty('Application\Author', 'firstName');

        $this->assertSame(['maxlength' => 20], $builder->getOption('attr'));
    }

    public function testCreateBuilderUsesMaxLengthAndPattern()
    {
        $guesser1 = FixedFormTypeGuesser::createMaxLengthGuesser('Application\Author', 'firstName', new ValueGuess(20, Guess::HIGH_CONFIDENCE));
        $guesser2 = FixedFormTypeGuesser::createPatternGuesser('Application\Author', 'firstName', new ValueGuess('.{5,}', Guess::HIGH_CONFIDENCE));

        $builder = $this->createFormFactory([$guesser1, $guesser2])->createBuilderForProperty('Application\Author', 'firstName', null, ['attr' => ['class' => 'tinymce']]);

        $this->assertSame(['maxlength' => 20, 'pattern' => '.{5,}', 'class' => 'tinymce'], $builder->getOption('attr'));
    }

    public function testCreateBuilderUsesRequiredSettingWithHighestConfidence()
    {
        $guesser1 = FixedFormTypeGuesser::createRequiredGuesser('Application\Author', 'firstName', new ValueGuess(true, Guess::MEDIUM_CONFIDENCE));
        $guesser2 = FixedFormTypeGuesser::createRequiredGuesser('Application\Author', 'firstName', new ValueGuess(false, Guess::HIGH_CONFIDENCE));

        $builder = $this->createFormFactory([$guesser1, $guesser2])->createBuilderForProperty('Application\Author', 'firstName');

        $this->assertFalse($builder->getRequired());
        $this->assertFalse($builder->getOption('required'));
    }

    public function testCreateBuilderUsesPatternIfFound()
    {
        $guesser1 = FixedFormTypeGuesser::createPatternGuesser('Application\Author', 'firstName', new ValueGuess('[a-z]', Guess::MEDIUM_CONFIDENCE));
        $guesser2 = FixedFormTypeGuesser::createPatternGuesser('Application\Author', 'firstName', new ValueGuess('[a-zA-Z]', Guess::HIGH_CONFIDENCE));

        $builder = $this->createFormFactory([$guesser1, $guesser2])->createBuilderForProperty('Application\Author', 'firstName');

        $this->assertSame(['pattern' => '[a-zA-Z]'], $builder->getOption('attr'));
    }

    private function createFormFactory(array $formTypeGuessers = [])
    {
        return (new FormFactoryBuilder())->addTypeGuessers($formTypeGuessers)->getFormFactory();
    }
}

class DummyType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(['a', 'b']);
        $resolver->setNormalizer('a', function (Options $options, $value) {
            return '1' === $value ? '2' : $value;
        });
        $resolver->setNormalizer('b', function (Options $options, $value) {
            return '2' === $value ? '3' : $value;
        });
    }

    public function getBlockPrefix()
    {
        return 'TYPE_PREFIX';
    }
}
