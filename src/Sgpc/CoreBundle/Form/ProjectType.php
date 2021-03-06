<?php

namespace Sgpc\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name')
                ->add('model', 'choice', array(
                    'label' => 'Modelo de desarrollo',
                    'choices' => array(
                        'kanban' => 'Kanban',
                        'scrum' => 'Scrum'
                    ),
                        )
                )
                ->add('description')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Sgpc\CoreBundle\Entity\Project'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'project';
    }

}
