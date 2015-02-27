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
     * @var \Symfony\Bundle\TwigBundle\Extension\AssetsExtension
     */
    private $assetHelper;

    /**
     * @var \Sleepness\UberFrontendValidationBundle\Factory\EntityConstraintsFactory
     */
    private $factory;

    /**
     * Set asset helper that
     *
     * @param $assetHelper
     */
    public function setAssetHelper($assetHelper)
    {
        $this->assetHelper = $assetHelper;
    }

    /**
     * Set validator service for be able to get entity metadata
     *
     * @param $factory
     */
    public function setConstraintsFactory($factory)
    {
        $this->factory = $factory;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('validation_init', array($this, 'getValidators'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('pure_field_name', array($this, 'getFieldName'), array('is_safe' => array('html'))),
        );
    }

    /**
     * Will return including all javascript files for validation
     */
    public function getValidators($form)
    {
        $output = '';
        $validators = $this->factory->getCurrentValidators($form->vars['value']);
        $output .= '<script type="text/javascript" src="' . $this->assetHelper->getAssetUrl('bundles/sleepnessuberfrontendvalidation/js/field_name_parser.js') . '"></script>';
        $output .= '<script type="text/javascript" src="' . $this->assetHelper->getAssetUrl('bundles/sleepnessuberfrontendvalidation/js/submit_validation.js') . '"></script>';
        foreach ($validators as $key => $validator) {
            $output .= '<script type="text/javascript" src="' . $this->assetHelper->getAssetUrl('bundles/sleepnessuberfrontendvalidation/js/constraints/' . $validator . '.js') . '"></script>';
        }

        return $output;
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
        $string = " " . $field;
        $ini = strpos($string, $start);
        if ($ini == 0) return "";
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;

        return substr($string, $ini, $len);
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
