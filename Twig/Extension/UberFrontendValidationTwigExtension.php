<?php

namespace Sleepness\UberFrontendValidationBundle\Twig\Extension;

/**
 * Extension, that provide some base twig functions for including javascript files, etc.
 */
class UberFrontendValidationTwigExtension extends \Twig_Extension
{

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'validation_init' => new \Twig_Function_Method($this, 'getValidators', array('is_safe' => array('html'))),
        );
    }

    /**
     * Will return including all javascript files for validation
     */
    public function getValidators()
    {
        // must return including scripts with validation rules
    }

    /**
     * Return name of extension
     *
     * @return string - name of extension
     */
    public function getName()
    {
        return 'uber_forntend_validation';
    }
} 
