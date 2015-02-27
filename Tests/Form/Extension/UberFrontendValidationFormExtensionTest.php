<?php

namespace Sleepness\UberFrontendValidationBundle\Tests\Form\Extension;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test suite for form extension
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 */
class UberFrontendValidationFormExtensionTest extends WebTestCase
{

    /**
     * @var \Sleepness\UberFrontendValidationBundle\Form\Extension\UberFrontendValidationFormExtension
     */
    private $extension;

    /**
     * Test if getExtendedType() returns proper value
     */
    public function testGetExtendedType()
    {
        $this->assertEquals('form', $this->extension->getExtendedType());
    }

    /**
     * Set up fixtures for testing
     */
    public function setUp()
    {
        static::bootKernel(array());
        $container = static::$kernel->getContainer();
        $this->extension = $container->get('uber_frontent_validation.form_extension');
    }
}
