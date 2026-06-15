<?php

namespace AppBundle\Form;


use AppBundle\Entity\TaskNote;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskNoteType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('description', null, [
                'label' => false,
                'attr'  => [
                    'rows' => 10
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Aggiungi',
                'attr'  => [
                    'class' => 'form-control btn btn-primary'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => TaskNote::class
        ]);
    }

    public function getBlockPrefix() {
        return 'app_bundle_task_note_type';
    }
}
