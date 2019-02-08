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
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\Extension\Core\DataMapper\PropertyPathMapper;
use Symfony\Component\Form\FormBuilder;

abstract class AbstractFormTest extends TestCase
{
    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * @var \Symfony\Component\Form\FormFactoryInterface
     */
    protected $factory;

    /**
     * @var \Symfony\Component\Form\FormInterface
     */
    protected $form;

    protected function setUp()
    {
        $this->dispatcher = new EventDispatcher();
        $this->factory = $this->getMockBuilder('Symfony\Component\Form\FormFactoryInterface')->getMock();
        $this->form = $this->createForm();
    }

    protected function tearDown()
    {
        $this->dispatcher = null;
        $this->factory = null;
        $this->form = null;
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    abstract protected function createForm();

    /**
     * @param string                   $name
     * @param EventDispatcherInterface $dispatcher
     * @param string|null              $dataClass
     * @param array                    $options
     *
     * @return FormBuilder
     */
    protected function getBuilder($name = 'name', EventDispatcherInterface $dispatcher = null, $dataClass = null, array $options = [])
    {
        return new FormBuilder($name, $dataClass, $dispatcher ?: $this->dispatcher, $this->factory, $options);
    }

    protected function getCompoundFormBuilder($name = 'name', $dataClass = null, array $options = [])
    {
        return (new FormBuilder($name, $dataClass, $this->dispatcher, $this->factory, $options))
            ->setCompound(true)
            ->setDataMapper(new PropertyPathMapper());
    }

    protected function createCompoundForm($name = 'name', $dataClass = null)
    {
        return $this->getCompoundFormBuilder($name, $dataClass)->getForm();
    }

    protected function createSimpleForm($name = 'name', $dataClass = null)
    {
        return (new FormBuilder($name, $dataClass, $this->dispatcher, $this->factory))->getForm();
    }

    protected function getDataMapper()
    {
        return $this->getMockBuilder('Symfony\Component\Form\DataMapperInterface')->getMock();
    }

    protected function getDataTransformer()
    {
        return $this->getMockBuilder('Symfony\Component\Form\DataTransformerInterface')->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getFormValidator()
    {
        return $this->getMockBuilder('Symfony\Component\Form\FormValidatorInterface')->getMock();
    }
}
