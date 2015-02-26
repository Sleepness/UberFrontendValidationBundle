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

    public function getConstraints($dataClass)
    {
        return $this->validator->getMetadataFor($dataClass);
    }
} 
