<?php

namespace Sleepness\UberFrontendValidationBundle\Factory;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use \Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * Test suite for factory class that provides metadata (constraints) for given entity
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @author Alexandr Zhulev <alexandrzhulev@gmail.com>
 */
class EntityConstraintsFactoryTest extends WebTestCase
{
    /**
     * @var \Sleepness\UberFrontendValidationBundle\Factory\EntityConstraintsFactory
     */
    private $factory;

    /**
     * Test getting metadata for given class
     */
    public function testGetEntityMetadata()
    {
        $constraints = $this->factory->getEntityMetadata('Sleepness\UberFrontendValidationBundle\Tests\Fixtures\Entity\Post');
        $this->assertTrue(is_object($constraints));
        $this->assertTrue($constraints instanceof ClassMetadata);
    }

    /**
     * Test getting array of validators for given class
     */
    public function testGetCurrentValidators()
    {
        $validators = $this->factory->getCurrentValidators('Sleepness\UberFrontendValidationBundle\Tests\Fixtures\Entity\Post');
        $this->assertEquals('NotBlank', $validators[0]);
        $this->assertEquals('Length', $validators[1]);
    }

    /**
     * Set up fixtures for testing
     */
    public function setUp()
    {
        static::bootKernel(array());
        $container = static::$kernel->getContainer();
        $this->factory = $container->get('uber_frontend_validation.entity_constraints_factory');
    }
}
