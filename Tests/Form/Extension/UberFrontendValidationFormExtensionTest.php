<?php

namespace Sleepness\UberFrontendValidationBundle\Tests\Form\Extension;

use ReflectionMethod;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test suite for form extension
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @author Alexandr Zhulev <alexandrzhulev@gmail.com>
 */
class UberFrontendValidationFormExtensionTest extends WebTestCase
{
    /**
     * @var \Sleepness\UberFrontendValidationBundle\Form\Extension\UberFrontendValidationFormExtension
     */
    private $extension;

    /**
     * @var \Symfony\Component\Validator\ValidatorInterface
     */
    private $validator;

    /**
     * Test getExtendedType() for proper returning value
     */
    public function testGetExtendedType()
    {
        $this->assertEquals('field', $this->extension->getExtendedType());
    }

    /**
     * Test preparing array of constraints based on entity metadata
     */
    public function testPrepareConstraintsAttributes()
    {
        $entityMetadata = $this->validator->getMetadataFor('Sleepness\UberFrontendValidationBundle\Tests\Fixtures\Entity\Post');
        $reflectedMethod = new ReflectionMethod($this->extension, 'prepareConstraintsAttributes');
        $reflectedMethod->setAccessible(TRUE);
        $preparedConstraintsAttributes = $reflectedMethod->invoke($this->extension, 'post[title]', $entityMetadata, array('Default'));
        $fullFieldNames = array_keys($preparedConstraintsAttributes);
        var_dump($preparedConstraintsAttributes);die;
//        var_dump($preparedConstraintsAttributes[$fullFieldNames[0]]);die;
        $constraintNames = array_keys($preparedConstraintsAttributes[$fullFieldNames[0]]);
        $constraintProperties = array_keys($preparedConstraintsAttributes[$fullFieldNames[0]][$constraintNames[0]]);
        $this->assertEquals('post[title]', $fullFieldNames[0]);
        $this->assertEquals('NotBlank', $constraintNames[0]);
        $this->assertEquals('Length', $constraintNames[1]);
        $this->assertEquals('message', $constraintProperties[0]);
        $this->assertEquals(
            'Title should not be blank!',
            $preparedConstraintsAttributes[$fullFieldNames[0]][$constraintNames[0]]['message']
        );
    }

    /**
     * Set up fixtures for testing
     */
    public function setUp()
    {
        static::bootKernel(array());
        $container = static::$kernel->getContainer();
        $this->extension = $container->get('uber_frontend_validation.form_extension');
        $this->validator = $container->get('validator');
    }
}
