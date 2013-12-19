<?php
namespace Application\SubscriberBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Knp\Menu\ItemInterface as MenuItemInterface;

class StudentAdmin extends Admin
{
    protected $translationDomain = 'SubscriberBundle';

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('firstname')
            ->add('lastname')
            //->add('middlename')
        //    ->add('gender')
            //->add('date_of_birth')
            //->add('nationality')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Profile')
            ->add('firstname')
            ->add('middlename')
            ->add('lastname')
            //->add('gender')
            ->add('gender', 'choice', array(
                'choices' => array('m' => 'male', 'f' => 'female'),
                'required' => false
                //'translation_domain' => $this->getTranslationDomain()
            ))
            ->add('date_of_birth', 'birthday')
            ->add('nationality', 'country')
            ->add('occupation')
            ->with('Contact info')
            ->add('phone')
            ->add('locality')
            ->add('region')
            ->add('country', 'country')
            ->end()
            ->with('Account')
            ->add('email')
            ->add('username')
            ->add('password')
            ->with('Extra')
            ->add('id_num', 'text')
            ->add('status')
            ->end()
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('firstname')
            ->add('lastname')
            ->add('nationality')
            ->add('_action', 'actions', array(
                    'actions' => array(
                        'show' => array(),
                        'edit' => array(),
                        'delete' => array(),
                    )
                ))
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('firstname')
            ->add('lastname')
            //->add('tags', null, array('field_options' => array('expanded' => true, 'multiple' => true)))
        ;
    }
}