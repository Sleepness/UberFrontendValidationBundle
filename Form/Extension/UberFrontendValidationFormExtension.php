<?php

namespace Sleepness\UberFrontendValidationBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

/**
 * From extension what make available client side validation,
 * by getting entity metadata and pass it in form theme
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @author Alexandr Zhulev <alexandrzhulev@gmail.com>
 */
class UberFrontendValidationFormExtension extends AbstractTypeExtension
{
    /**
     * @var \Symfony\Component\Validator\ValidatorInterface
     */
    private $validator;

    /**
     * Set validator service to be able to get entity metadata
     *
     * @param $validator
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $fieldName = $view->vars['full_name'];
        $parentForm = $form->getParent();
        if ($parentForm !== null) {
            $config = $parentForm->getConfig();
            $validationGroups = $config->getOptions()['validation_groups'];
            $dataClass = $config->getDataClass();
            $entityMetadata = ($dataClass !== null) ? $this->validator->getMetadataFor($dataClass) : null;
            $view->vars['entity_constraints'] = $this->prepareConstraintsAttributes($fieldName, $entityMetadata, $validationGroups);
        }
    }

    /**
     * Prepare array of constraints based on entity metadata
     *
     * @param $fieldName - name of form field
     * @param $entityMetadata - entity metadata
     * @param $validationGroups - form validation groups
     * @return array            - prepared constraints for given field
     */
    private function prepareConstraintsAttributes($fieldName, $entityMetadata, $validationGroups)
    {
        $result = array();
        preg_match("/\[([^\]]*)\]/", $fieldName, $matches);
        $parsedFieldName = $matches[1];
        if ($entityMetadata !== null) {
            $entityProperties = $entityMetadata->properties;
            foreach ($entityProperties as $property => $credentials) {
                if ($property == $parsedFieldName) {
                    if (($validationGroups !== null)) {
                        $difference = array_diff($validationGroups, array_keys($credentials->constraintsByGroup));
                        if (count($difference) < count($validationGroups)) {
                            $result = $this->fillResults($entityProperties[$property]->constraints, $fieldName, $result);
                        }
                    } else {
                        $result = $this->fillResults($entityProperties[$property]->constraints, $fieldName, $result);
                    }
                }
            }
        }

        return $result;
    }

    /**
     * Push into results array constraints for certain property
     *
     * @param $constraints
     * @param $fieldName
     * @param $result
     * @return mixed
     */
    private function fillResults($constraints, $fieldName, $result)
    {
        foreach ($constraints as $constraint) {
            $partsOfConstraintName = explode('\\', get_class($constraint));
            $constraintName = end($partsOfConstraintName);
            foreach ($constraint as $constraintProperty => $constraintValue) {
                $result[$fieldName][$constraintName][$constraintProperty] = $constraintValue;
            }
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return 'field';
    }
} 
