<?php

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class UserAdmin extends AbstractAdmin {

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('id')
            ->add('username', null, ['label' => 'Username'])
            ->add('email', null, ['label' => 'Email'])
            ->add('enabled', null, ['label' => 'Abilitato']);
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('id')
            ->add('username', null, ['label' => 'Username'])
            ->add('email', null, ['label' => 'Email'])
            ->add('enabled', null, ['label' => 'Abilitato'])
            ->add('lastLogin', null, ['label' => 'Ultima login'])
            ->add('passwordRequestedAt', null, ['label' => 'Password richiesta il'])
            ->add('roles', null, ['label' => 'Ruolo'])
            ->add('isDeleted', 'boolean', ['label' => 'Eliminato'])
            ->add('createdAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Creato il'])
            ->add('updatedAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Aggiornato il'])
            ->add('deletedAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Eliminato il'])
            ->add('_action', null, [
                'actions' => [
                    'show'   => [],
                    'edit'   => [],
                    'delete' => [],
                    'masquerade' => [
                        'template' => 'AppBundle:CRUD:list__action_impersonate.html.twig',
                    ],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->add('username', null, ['label' => 'Username'])
            ->add('email', null, ['label' => 'Email'])
            ->add('enabled', null, ['label' => 'Abilitato'])
            ->add('plainPassword', 'text', ['label' => 'Password'])
            ->add('roles', null, ['label' => 'Ruolo']);
    }

    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
            ->add('id')
            ->add('username', null, ['label' => 'Username'])
            ->add('email', null, ['label' => 'Email'])
            ->add('enabled', null, ['label' => 'Abilitato'])
            ->add('lastLogin', null, ['label' => 'Ultimo login'])
            ->add('passwordRequestedAt', null, ['label' => 'Password richiesta il'])
            ->add('roles', null, ['label' => 'Ruolo'])
            ->add('createdBy', null, ['label' => 'Creato da'])
            ->add('updatedBy', null, ['label' => 'Aggiornato da'])
            ->add('deletedBy', null, ['label' => 'Eliminato da'])
            ->add('createdAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Creato il'])
            ->add('updatedAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Aggiornato il'])
            ->add('deletedAt', null, ['format' => 'd/m/Y H:i:s', 'label' => 'Eliminato il']);
    }
}
