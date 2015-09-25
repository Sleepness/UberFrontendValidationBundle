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
    public function setTwig(\Twig_Extension $twig)
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
     * @param $minificator
     * @return string
     */
    public function validationInit($minificator = null)
    {
        $response = $this->twig->render('SleepnessUberFrontendValidationBundle::form_validation.html.twig');
        if ($minificator == 'yui') {
            $response = $this->twig->render('SleepnessUberFrontendValidationBundle::form_validation_yui.html.twig');
        }
        if ($minificator == 'uglify') {
            $response = $this->twig->render('SleepnessUberFrontendValidationBundle::form_validation_uglify.html.twig');
        }

        return $response;
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
     * {@inherit}
     */
    public function getName()
    {
        return 'uber_frontend_validation';
    }
} 
