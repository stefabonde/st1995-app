<?php

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ClientAdmin extends AbstractAdmin {

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('id')
            ->add('name', null, ['label' => 'Nome']);
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('id')
            ->add('name', null, ['label' => 'Nome'])
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
        $formMapper
            ->add('name', null, ['label' => 'Titolo']);
    }

    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
            ->add('id')
            ->add('name', null, ['label' => 'Titolo'])
            ->add('createdBy', null, ['label' => 'Creato da'])
            ->add('updatedBy', null, ['label' => 'Aggiornato da'])
            ->add('deletedBy', null, ['label' => 'Eliminato da'])
            ->add('createdAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Creato il'])
            ->add('updatedAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Aggiornato il'])
            ->add('deletedAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Eliminato il']);
    }
}
