<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 08/04/18
 * Time: 12:08 PM
 */

namespace AppBundle\Form\Infra;

use AppBundle\Entity\Infra\Category;
use AppBundle\Entity\Infra\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityManager;
use AppBundle\Repository\Infra\CategoryRepository as CR;

class ProductType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$repository = $this->getDoctrine()->getRepository(Category::class);
        //$products = $repository->findAll();
        $manager = $options['catRepo'];
        $builder->add('name')
                ->add('description')
                ->add('price')
                ->add('category', EntityType::class, [
                    // looks for choices from this entity
                    'class' => 'AppBundle:Infra\Category',
                    //'query_builder' => function (EntityRepository $er) {
                    //    return $er->createQueryBuilder('u')
                    //        ->orderBy('u.username', 'ASC');
                    //},

                    // uses the User.username property as the visible option string
                    'choices' => $manager->findAll(),
                ])
            ->add('save', SubmitType::class, array('label' => 'Create Product'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Product::class,
            'catRepo' => null,
        ));
    }

}