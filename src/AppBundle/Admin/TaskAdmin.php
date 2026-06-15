<?php

namespace AppBundle\Admin;


use AppBundle\Entity\Client;
use AppBundle\Entity\Project;
use Doctrine\ORM\EntityManager;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class TaskAdmin extends AbstractAdmin {

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('id')
            ->add('title', null, ['label' => 'Titolo'])
            ->add('priority', null, ['label' => 'Priorità'])
            ->add('assignee', null, ['label' => 'ASsegnato a']);
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('id')
            ->add('isDeleted', 'boolean', ['label' => 'Eliminato'])
            ->add('title', null, ['label' => 'Titolo'])
            ->add('priority', null, ['label' => 'Priorità'])
            ->add('assignee', null, ['label' => 'Assegnato a'])
            ->add('project', null, ['label' => 'Progetto'])
            ->add('createdAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Creato il'])
            ->add('updatedAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Aggiornato il'])
            ->add('deletedAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Eliminato il'])
            ->add('_action', null, [
                'actions' => [
                    'show'   => [],
                    'edit'   => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper) {
        $projectOptions = ['label' => 'Progetto'];

        /** @var EntityManager $em */
        $em = $this->modelManager->getEntityManager(Project::class);
        $queryProject = $em->createQueryBuilder()
            ->select('p')
            ->from('AppBundle:Project', 'p')
            ->where('p.deletedAt IS NULL')
            ->addOrderBy('p.name');
        $projectOptions['query'] = $queryProject;

        $formMapper
            ->add('project', 'sonata_type_model', $projectOptions)
            ->add('title', null, ['label' => 'Titolo'])
            ->add('description', null, ['label' => 'Descrizione'])
            ->add('priority', null, ['label' => 'Priorità'])
            ->add('assignee', null, ['label' => 'Assegnato a']);
    }

    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
            ->add('id')
            ->add('isDeleted', 'boolean', ['label' => 'Eliminato'])
            ->add('title', null, ['label' => 'Titolo'])
            ->add('priority', null, ['label' => 'Priorità'])
            ->add('assignee', null, ['label' => 'Assegnato a'])
            ->add('project', null, ['label' => 'Progetto'])
            ->add('description', null, ['label' => 'Descrizione', 'safe' => true])
            ->add('createdBy', null, ['label' => 'Creato da'])
            ->add('updatedBy', null, ['label' => 'Aggiornato da'])
            ->add('deletedBy', null, ['label' => 'Eliminato da'])
            ->add('createdAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Creato il'])
            ->add('updatedAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Aggiornato il'])
            ->add('deletedAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Eliminato il']);
    }
}
