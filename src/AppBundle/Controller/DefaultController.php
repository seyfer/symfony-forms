<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Item;
use AppBundle\Entity\Product;
use AppBundle\Form\Type\ItemType;
use AppBundle\Form\Type\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="form_example")
     */
    public function formExampleAction(Request $request)
    {
        /** @var Form $form */
        $form = $this->createFormBuilder()
                     ->add('personName', TextType::class)
                     ->add('submit', SubmitType::class)
                     ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($form->getData());

            $this->sendMail($form->getData()['personName']);
        }

        return $this->render(':default:form-example.html.twig', [
            'myForm' => $form->createView()
        ]);
    }

    private function sendMail($personName)
    {
        $mail = \Swift_Message::newInstance()
                              ->setSubject('test')
                              ->setFrom('test@test.com')
                              ->setTo('seyferseed@mail.ru')
                              ->setBody($personName);

        $this->get('mailer')->send($mail);
    }

    /**
     *
     * @Route("/add-product", name="add-product")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function formAddExampleAction(Request $request)
    {
        $form = $this->createForm(ProductType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            /** @var Product $product */
            $product = $form->getData();

            $em->persist($product);
            $em->flush();

            $this->addFlash('success', 'Product added ' . $product->getId());
        }

        return $this->render(':default:add-form.html.twig', [
            'myForm' => $form->createView()
        ]);

    }

    /**
     * @Route("/edit-product/{product}", name="edit-product", defaults={"product":null})
     */
    public function formEditAction(Request $request, Product $product)
    {
        $em = $this->getDoctrine()->getManager();

        //with productId
//        $product = $em->getRepository('AppBundle:Product')->find($productId);

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            $this->addFlash('success', 'Product edited ' . $product->getId());

            return $this->redirectToRoute('edit-product', ['product' => $product->getId()]);
        }

        return $this->render(':default:edit-form.html.twig', [
            'myForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit-item/{item}", name="edit-item", defaults={"item":null})
     */
    public function formEditItemAction(Request $request, Item $item)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(ItemType::class, $item);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            $this->addFlash('success', 'Item edited ' . $item->getId());

            return $this->redirectToRoute('edit-item', ['item' => $item->getId()]);
        }

        return $this->render(':default:float.html.twig', [
            'myForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/index", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }
}
