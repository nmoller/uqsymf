<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 08/04/18
 * Time: 12:07 PM
 */

namespace AppBundle\Form\Infra;

use AppBundle\Entity\Infra\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Category::class,
        ));
    }
}