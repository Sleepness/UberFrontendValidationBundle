<?php

namespace Sleepness\UberFrontendValidationBundle\Tests\Twig\Extension;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test twig extension for validation
 */
class UberFrontendValidationTwigExtensionTest extends WebTestCase
{
    /**
     * @var \Sleepness\UberFrontendValidationBundle\Twig\Extension\UberFrontendValidationTwigExtension
     */
    private $extension;

    /**
     * Test method that returns pure field name
     */
    public function testGetFieldName()
    {
        $fieldName = 'post[title]';
        $pureFieldName = $this->extension->getFieldName($fieldName);

        $this->assertEquals('title', $pureFieldName);
    }

    /**
     * Set up fixtures for testing
     */
    public function setUp()
    {
        static::bootKernel(array());
        $container = static::$kernel->getContainer();
        $this->extension = $container->get('uber_frontent_validation.twig_extension');
    }
} 
