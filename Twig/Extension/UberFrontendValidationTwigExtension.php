<?php

namespace Sleepness\UberFrontendValidationBundle\Twig\Extension;

/**
 * Extension, that provide some base twig functions for including javascript files, etc.
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @author Alexandr Zhulev <alexandrzhulev@gmail.com>
 */
class UberFrontendValidationTwigExtension extends \Twig_Extension
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @param $twig
     */
    public function setTwig($twig)
    {
        $this->twig = $twig;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('validation_init', array($this, 'validationInit'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('pure_field_name', array($this, 'getFieldName'), array('is_safe' => array('html'))),
        );
    }

    /**
     * Will return including all javascript files for validation
     *
     * @return string
     */
    public function validationInit()
    {
        return $this->twig->render('SleepnessUberFrontendValidationBundle::form_validation.html.twig');
    }

    /**
     * Return pure field name
     *
     * @param $field
     * @return string
     */
    public function getFieldName($field)
    {
        preg_match("/\[([^\]]*)\]/", $field, $matches);

        return $matches[1];
    }

    /**
     * Return name of extension
     *
     * @return string - name of extension
     */
    public function getName()
    {
        return 'uber_frontend_validation';
    }
} 
