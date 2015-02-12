<?php

namespace Sleepness\UberClientSideValidationBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class UberClientSideValidationFormExtension extends AbstractTypeExtension
{
    private $validator;

    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param FormView $view
     * @param FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $config = $form->getConfig();
        $view->vars['attr']['class'] = 'custom_form';
        $view->vars['error_mapping'] = $config->getOption('error_mapping');
    }

    /**
     * Returns the name of the type being extended.
     *
     * @return string The name of the type being extended
     */
    public function getExtendedType()
    {
        return 'field';
    }
} 
