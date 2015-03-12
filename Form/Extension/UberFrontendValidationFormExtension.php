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
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $fullFieldName = $view->vars['full_name'];
        $parentForm = $form->getParent();
        if ($parentForm) {
            $config = $parentForm->getConfig();
            $validationGroups = $config->getOptions()['validation_groups'];
            $dataClass = $config->getDataClass();
            $entityMetadata = null;
            if ($dataClass != null) {
                $entityMetadata = $this->factory->getEntityMetadata($dataClass);
            }
            $view->vars['entity_constraints'] = $this->prepareConstraintsAttributes($fullFieldName, $entityMetadata, $validationGroups);
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
     * @param $fullFieldName - name of form field
     * @param $entityMetadata - entity metadata
     * @param $validationGroups - form validation groups
     * @return array            - prepared constraints for given field
     */
    private function prepareConstraintsAttributes($fullFieldName, $entityMetadata, $validationGroups)
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
                    if (($validationGroups != null)) {
                        if (in_array($validationGroups[0], array_keys($credentials->constraintsByGroup))) {
                            $constraints = $entityProperties[$property]->constraints;
                            foreach ($constraints as $constraint) {
                                $partsOfConstraintName = explode('\\', get_class($constraint));
                                $constraintName = end($partsOfConstraintName);
                                foreach ($constraint as $constraintProperty => $constraintValue) {
                                    $result[$fullFieldName][$constraintName][$constraintProperty] = $constraintValue;
                                }
                            }
                        }
                    } else {
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
        }

        return $result;
    }
} 
