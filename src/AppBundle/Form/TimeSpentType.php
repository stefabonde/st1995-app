<?php

namespace AppBundle\Form;


use AppBundle\Entity\Project;
use AppBundle\Entity\Task;
use AppBundle\Entity\TimeSpent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimeSpentType extends AbstractType {

    use ContainerAwareTrait;

    public function __construct(ContainerInterface $container) {
        $this->setContainer($container);
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('hours', NumberType::class, [
                'label' => 'Ore *'
            ])
            ->add('date', null, [
                'label' => 'Data *'
            ])
            ->add('project', EntityType::class, [
                'class'       => Project::class,
                'label'       => 'Progetto *',
                'placeholder' => 'Seleziona progetto'
            ])
            ->add('task', ChoiceType::class, [
                'label'       => 'Attività',
                'placeholder' => '-',
                'choices'     => []
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Salva',
                'attr'  => [
                    'class' => 'form-control btn btn-primary'
                ]
            ]);

        $formModifier = function (FormInterface $form, $project = null) {
            if (!empty($project)) {
                $user = $this->container->get('security.token_storage')->getToken()->getUser();
                $tasks = $this->container->get('doctrine')->getRepository('AppBundle:Task')->assignedTo($user, $project);
                if (empty($tasks)) {
                    $placeholder = '-';
                } else {
                    $placeholder = 'Seleziona attività';
                }
                $form->add('task', ChoiceType::class, [
                    'placeholder'  => $placeholder,
                    'choices'      => $tasks,
                    'choice_label' => function ($task, $key, $index) {
                        /** @var Task $task */
                        return $task->getTitle();
                    },
                    'choice_value' => function (Task $entity = null) {
                        return $entity ? $entity->getId() : '';
                    },
                ]);
            }
        };

        $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $data = $event->getData();

                $project = !empty($data['project']) ? $data['project'] : null;

                $formModifier($event->getForm(), $project);
            }
        );

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                $data = $event->getData();

                $project = !empty($data->getProject()) ? $data->getProject() : null;

                $formModifier($event->getForm(), $project);
            }
        );

        $builder->get('project')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $data = $event->getForm()->getData();
                $formModifier($event->getForm()->getParent(), $data);
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver
            ->setDefaults([
                'data_class' => TimeSpent::class
            ]);
    }

    public function getBlockPrefix() {
        return 'app_bundle_time_spent_type';
    }
}
