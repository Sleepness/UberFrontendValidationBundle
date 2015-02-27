<?php

namespace Sleepness\UberFrontendValidationBundle\Factory;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use \Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * Test suite for factory class what provide entity metadata(constraints) for given entity
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
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
        $constraints =  $this->factory->getEntityMetadata('Sleepness\UberFrontendValidationBundle\Tests\Fixtures\Entity\Post');
        $this->assertTrue(is_object($constraints));
        $this->assertTrue($constraints instanceof ClassMetadata);
    }

    /**
     * Set up fixtures for testing
     */
    public function setUp()
    {
        static::bootKernel(array());
        $container = static::$kernel->getContainer();
        $this->factory = $container->get('uber_frontent_validation.entity_constraints_factory');
    }
}
