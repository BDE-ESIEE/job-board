<?php

namespace Zephyr\JobBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array(
                    'required' => true,
                    'label' => 'Titre'))
            ->add('category', 'entity', array(
                    'class'    => 'ZephyrJobBundle:Category',
                    'choice_label' => 'name',
                    'multiple' => false,
                    'expanded' => false,
                    'required' => true,
                    'label' => 'Catégorie'))
            ->add('short_content', 'text', array(
                    'required' => true,
                    'attr' => array('placeholder' => 'Pas plus de 20 mots'),
                    'label' => 'Aperçu'))
            ->add('content', 'ckeditor', array(
                    'label' => "Contenu de l'annonce",
                    'config' => array(
                        'uiColor' => '#ffffff',
                    )
                )
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Zephyr\JobBundle\Entity\Job',
            'csrf_protection' => false,
        ));
    }

    public function getName()
    {
        return 'job';
    }
}