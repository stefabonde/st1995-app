<?php
/**
 * Created by PhpStorm.
 * User: lpezzali
 * Date: 2019-03-12
 * Time: 23:37
 */

namespace AppBundle\Form;


use AppBundle\Entity\Project;
use AppBundle\Model\ReportFilter;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReportFilterType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('start', DateType::class, [
                'label'      => 'Data inizio',
                'widget'     => 'single_text',
                'label_attr' => [
                    'class' => 'mr-2'
                ],
                'attr'       => [
                    'class' => 'mr-3'
                ]
            ])
            ->add('end', DateType::class, [
                'label'      => 'Data fine',
                'widget'     => 'single_text',
                'label_attr' => [
                    'class' => 'mr-2'
                ],
                'attr'       => [
                    'class' => 'mr-3'
                ]
            ])
            ->add('project', EntityType::class, [
                'class'         => Project::class,
                'label'         => 'Progetto',
                'required'      => false,
                'placeholder'   => 'Progetto',
                'label_attr'    => [
                    'class' => 'mr-2'
                ],
                'attr'          => [
                    'class'       => 'select2 mr-3',
                    'placeholder' => 'Progetto'
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
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Filtra',
                'attr'  => [
                    'class' => 'form-control btn btn-primary'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => ReportFilter::class
        ]);
    }

    public function getBlockPrefix() {
        return 'app_bundle_report_filter_type';
    }

}