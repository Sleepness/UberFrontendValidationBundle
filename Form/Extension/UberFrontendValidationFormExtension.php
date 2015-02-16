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
     * Extend build form view to be able made some customization with fields
     *
     * @param FormView $view
     * @param FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $config = $form->getConfig();
        $formData = $config->getData();
//        $entityMetadata = $this->validator->getMetadataFactory()->getMetadataFor($formData); //return metadata of the entity
        $entityMetadata = $this->validator->getMetadataFactory()->getMetadataFor('Acme\DemoBundle\Entity\Post'); //return metadata of the entity
        $this->prepareConstraintsAttributes($entityMetadata);
        $view->vars['attr']['class'] = 'custom_form'; // play around and add dummy class for form
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

    /**
     * Prepare array ith constraints based on entity metadata
     *
     * @param $entityMetadata
     * @return array
     */
    private function prepareConstraintsAttributes($entityMetadata)
    {
        $result = array();
        foreach ($entityMetadata->properties as $property => $credentials) {
            $constraints = $entityMetadata->properties[$property]->constraints;
            foreach ($constraints as $key => $constraint) {
                $constraintName = explode('\\', get_class($constraint));
                $constraintName = end($constraintName);
                if (isset($constraint->message)) {
                    $message = $constraint->message;
                }  else {
                    $message ='';
                }

                $result[$property][] = array(
                    'constraint' => $constraintName,
                    'message'    => $message,
                );
            }
        }

        return $result;
    }
} 
