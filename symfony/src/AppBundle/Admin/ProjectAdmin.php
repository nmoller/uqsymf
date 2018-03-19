<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 19/03/18
 * Time: 2:03 PM
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\Type\ModelType;


class ProjectAdmin extends AbstractAdmin {
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
          ->add('title' , 'text')
          ->add('description', 'textarea')
          ->add('workcpace',ModelType::class,
            array(
              'class' => 'AppBundle\Entity\Workcpace',
              'property' => 'name'
            ))
          ->add('dueDate', 'date',
            array(
              'input'  => 'datetime',
              'widget' => 'single_text',
              'format' => 'yyyy-MM-dd',
            ));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(
      DatagridMapper $datagridMapper)
    {
        $datagridMapper
          ->add('title')
          ->add('description')
          ->add('workcpace')
          ->add('dueDate');
    }

    // Fields to be shown on lists
    protected function configureListFields(
      ListMapper $listMapper)
    {
        $listMapper
          ->addIdentifier('name')
          ->add('description');
    }
}