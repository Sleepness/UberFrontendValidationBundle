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
            'pure_field_name' => new \Twig_Function_Method($this, 'getFieldName', array('is_safe' => array('html'))),
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
     * Return pure field name
     *
     * @param $field
     * @return string
     */
    public function getFieldName($field)
    {
        $start = "[";
        $end = "]";
        $string = " ".$field;
        $ini = strpos($string,$start);
        if ($ini == 0) return "";
        $ini += strlen($start);
        $len = strpos($string, $end,$ini) - $ini;

        return substr($string,$ini,$len);
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
