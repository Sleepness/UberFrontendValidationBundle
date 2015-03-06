<?php

namespace Sleepness\UberFrontendValidationBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Validator\Validator;

/**
 * From extension what make available client side validation available
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @author Alexandr Zhulev <alexandrzhulev@gmail.com>
 */
class UberFrontendValidationFormExtension extends AbstractTypeExtension
{
    /**
     * @var \Sleepness\UberFrontendValidationBundle\Factory\EntityConstraintsFactory
     */
    private $factory;

    /**
     * Set validator service to be able to get entity metadata
     *
     * @param $factory
     */
    public function setConstraintsFactory($factory)
    {
        $this->factory = $factory;
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
        $fullFieldName = $view->vars['full_name'];
        $parentForm = $form->getParent();
        if ($parentForm) {
            $config = $parentForm->getConfig();
            $dataClass = $config->getDataClass();
            $entityMetadata = null;
            if ($dataClass) {
                $entityMetadata = $this->factory->getEntityMetadata($dataClass);
            }
            $view->vars['entity_constraints'] = $this->prepareConstraintsAttributes($fullFieldName, $entityMetadata);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return 'form';
    }

    /**
     * Prepare array of constraints based on entity metadata
     *
     * @param $fullFieldName
     * @param $entityMetadata
     * @return array
     */
    private function prepareConstraintsAttributes($fullFieldName, $entityMetadata)
    {
        $result = array();
        $start = strrpos($fullFieldName, '[') + 1;
        $finish = strrpos($fullFieldName, ']');
        $length = $finish - $start;
        $fieldName = substr($fullFieldName, $start, $length);
        if ($entityMetadata != null) {
            $entityProperties = $entityMetadata->properties;
            foreach ($entityProperties as $property => $credentials) {
                if ($property == $fieldName) {
                    $constraints = $entityProperties[$property]->constraints;
                    foreach ($constraints as $constraint) {
                        $partsOfConstraintName = explode('\\', get_class($constraint));
                        $constraintName = end($partsOfConstraintName);
                        foreach ($constraint as $constraintProperty => $constraintValue) {
                            $result[$fullFieldName][$constraintName][$constraintProperty] = $constraintValue;
                        }
                    }
                }
            }
        }

        return $result;
    }
} 
