<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Entity\Infra\Category;
use AppBundle\Entity\Infra\Product;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Form\Infra\ProductType;
use AppBundle\Form\Infra\CategoryType;

class DefaultController extends Controller

{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $prod = new Product();
        $repo = $this->getDoctrine()->getRepository(Category::class);
        $form = $this->createForm(ProductType::class, $prod, [
            'catRepo' => $repo,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated

            $product = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

//            ob_start();
//            echo '<pre>';
//            var_dump($product); //would normally get printed to the screen/output to browser
//            echo '</pre>';
//            $output = ob_get_contents();
//            ob_end_clean();
//
//            return new Response($output);
            return $this->redirectToRoute('form_success', ['saved_id' => $product->getId()]);
        }


        return $this->render('default/form.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/afterForm/{saved_id}", name="form_success", requirements={"saved_id"="\d+"})
     */
    public function createdAction(Request $request, $saved_id = 1) {
        return $this->render('default/afterForm.html.twig', array(
            'id' => $saved_id,
        ));
    }
}
