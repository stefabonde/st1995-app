<?php

namespace AppBundle\Form;


use AppBundle\Entity\Priority;
use AppBundle\Entity\Project;
use AppBundle\Entity\Task;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('title', null, ['label' => 'Titolo'])
            ->add('priority', EntityType::class, [
                'class'         => Priority::class,
                'label'         => 'Priorità',
                'query_builder' => function (EntityRepository $entityRepository) {
                    return $entityRepository->createQueryBuilder('p')
                        ->select('p')
                        ->where('p.deletedAt is null')
                        ->orderBy('p.weight');
                }
            ]);

        if (!$options['new']) {
            $builder->add('project', EntityType::class, [
                'class'         => Project::class,
                'label'         => 'Progetto',
                'required'      => true,
                'attr'          => [
                    'class' => 'select2'
                ],
                'query_builder' => function (EntityRepository $entityRepository) {
                    return $entityRepository->createQueryBuilder('p')
                        ->select('p')
                        ->join('p.client', 'c')
                        ->where('p.deletedAt is null')
                        ->andWhere('c.deletedAt is null')
                        ->orderBy('c.name')
                        ->addOrderBy('p.name');
                }
            ]);
        }

        if ($options['container']->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $builder->add('assignee', EntityType::class, [
                'class'         => User::class,
                'label'         => 'Assegnato a',
                'multiple'      => true,
                'attr'          => [
                    'class' => 'select2'
                ],
                'query_builder' => function (EntityRepository $entityRepository) {
                    return $entityRepository->createQueryBuilder('u')
                        ->select('u')
                        ->where('u.deletedAt is null')
                        ->orderBy('u.username');
                }
            ]);
        }

        $builder->add('description', null, [
            'label' => 'Descrizione',
            'attr'  => [
                'rows' => 10
            ]
        ]);

        $builder->add('submit', SubmitType::class, [
            'label' => 'Salva',
            'attr'  => [
                'class' => 'form-control btn btn-primary'
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver
            ->setDefaults([
                'data_class' => Task::class
            ])
            ->setRequired([
                'new',
                'container'
            ]);
    }

    public function getBlockPrefix() {
        return 'app_bundle_task_type';
    }
}
