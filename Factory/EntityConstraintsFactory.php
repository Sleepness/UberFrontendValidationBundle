<?php

namespace Sleepness\UberFrontendValidationBundle\Factory;

use Symfony\Component\Validator\Validator;

/**
 * Factory class what provide entity metadata(constraints) for given entity
 */
class EntityConstraintsFactory
{
    /**
     * @var Validator
     */
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
     * Get metadata for given class
     *
     * @param $dataClass
     * @return \Symfony\Component\Validator\MetadataInterface
     */
    public function getEntityMetadata($dataClass)
    {
        return $this->validator->getMetadataFor($dataClass);
    }

    /**
     * @param $dataClass
     * @return array
     */
    public function getCurrentValidators($dataClass)
    {
        $validators = array();
        $properties = $this->getEntityMetadata($dataClass)->properties;
        foreach ($properties as $property => $property_metadata) {
            foreach ($property_metadata->constraints as $key => $constraint) {
                $namespaceParts = explode('\\', get_class($constraint));
                $constraintName = end($namespaceParts);
                if (!in_array($constraintName, $validators)) {
                    $validators[] = $constraintName;
                }
            }
        }

        return $validators;
    }
} 
