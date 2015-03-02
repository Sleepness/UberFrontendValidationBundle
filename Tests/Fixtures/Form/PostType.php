<?php

namespace Sleepness\UberFrontendValidationBundle\Tests\Fixtures\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Simple form class for testing bundle behavior
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 */
class PostType extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text', ['label' => 'form.title'])
            ->add('email', 'email', ['label' => 'form.email'])
            ->add('date', 'datetime', ['widget' => 'single_text', 'label' => 'form.date'])
            ->add('content', 'textarea', ['label' => 'form.content'])
            ->add('submit','submit')
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Sleepness\UberFrontendValidationBundle\Tests\Fixtures\Entity\Post',
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'post';
    }
}
