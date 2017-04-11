<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 4/11/17
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Battle;
use AppBundle\Form\Type\BattleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BattleController
 * @package AppBundle\Controller
 *
 * @Route("/battle")
 */
class BattleController extends Controller
{
    /**
     * @Route("/add", name="battle_add_example")
     */
    public function formAddExampleAction(Request $request)
    {
        $form = $this->createForm(BattleType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $battle = $form->getData();

            $em->persist($battle);
            $em->flush();

            $this->addFlash('success', 'We saved a battle with id ' . $battle->getId());
        }

        return $this->render(':battle:index.html.twig', [
            'myForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{battle}", name="battle_edit_example")
     */
    public function formEditExampleAction(Request $request, Battle $battle)
    {
        $form = $this->createForm(BattleType::class, $battle);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('info', 'We edited a battle with id ' . $battle->getId());

            return $this->redirectToRoute('battle_edit_example');
        }

        return $this->render(':battle:index.html.twig', [
            'myForm' => $form->createView()
        ]);
    }
}