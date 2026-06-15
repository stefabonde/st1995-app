<?php

namespace AppBundle\Admin;


use AppBundle\Entity\Client;
use AppBundle\Entity\TipoAbbonamento;
use Doctrine\ORM\EntityManager;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProjectAdmin extends AbstractAdmin {

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('id')
            ->add('name', null, ['label' => 'Nome'])
            ->add('client', null, ['label' => 'Cliente']);
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('id')
            ->add('name', null, ['label' => 'Nome'])
            ->add('client', null, ['label' => 'Cliente'])
            ->add('isDeleted', 'boolean', ['label' => 'Eliminato'])
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
        $clientOptions = ['label' => 'Cliente'];

        /** @var EntityManager $em */
        $em = $this->modelManager->getEntityManager(Client::class);
        $queryClient = $em->createQueryBuilder()
            ->select('c')
            ->from('AppBundle:Client', 'c')
            ->where('c.deletedAt IS NULL')
            ->addOrderBy('c.name');
        $clientOptions['query'] = $queryClient;

        $formMapper
            ->add('client', 'sonata_type_model', $clientOptions)
            ->add('name', null, ['label' => 'Nome']);
    }

    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
            ->add('id')
            ->add('name', null, ['label' => 'Titolo'])
            ->add('client', null, ['label' => 'Titolo'])
            ->add('createdBy', null, ['label' => 'Creato da'])
            ->add('updatedBy', null, ['label' => 'Aggiornato da'])
            ->add('deletedBy', null, ['label' => 'Eliminato da'])
            ->add('createdAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Creato il'])
            ->add('updatedAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Aggiornato il'])
            ->add('deletedAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Eliminato il']);
    }
}
