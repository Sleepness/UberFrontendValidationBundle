<?php

namespace Sleepness\UberFrontendValidationBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

/**
 * Class that will extend base form abilities
 */
class UberFrontendValidationFormExtension extends AbstractTypeExtension
{
    private $validator;

    /**
     * Set validator service for be able to get entity metadata
     *
     * @param $validator
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

    /**
     * Extend building form view to be able to customize form fields
     *
     * @param FormView $view
     * @param FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $parentForm = $form->getParent();
        if ($parentForm) {
            $config = $parentForm->getConfig();
            $dataClass = $config->getDataClass();
            $entityMetadata = null;
            if ($dataClass) {
                $entityMetadata = $this->validator->getMetadataFor($dataClass);
            }
            $view->vars['entity_constraints'] = $this->prepareConstraintsAttributes($entityMetadata);
        }
    }

    /**
     * Returns the name of the type being extended.
     *
     * @return string The name of the type being extended
     */
    public function getExtendedType()
    {
        return 'form';
    }

    /**
     * Prepare array ith constraints based on entity metadata
     *
     * @param $entityMetadata
     * @return array
     */
    private function prepareConstraintsAttributes($entityMetadata)
    {
        $result = array();
        if ($entityMetadata != null) {
            foreach ($entityMetadata->properties as $property => $credentials) {
                $constraints = $entityMetadata->properties[$property]->constraints;
                foreach ($constraints as $key => $constraint) {
                    $partsOfConstraintName = explode('\\', get_class($constraint));
                    $constraintName = end($partsOfConstraintName);
                    if (isset($constraint->message)) {
                        $message = $constraint->message;
                    } else {
                        $message = '';
                    }
                    $additional = array();
                    if ($constraintName == 'Length') {
                        $additional['min'] = $constraint->min;
                        $additional['max'] = $constraint->max;
                    }
                    $result[$property][] = array(
                        'constraint' => $constraintName,
                        'message'    => $message,
                        'additional' => $additional,
                    );
                }
            }
        }

        return $result;
    }
} 
