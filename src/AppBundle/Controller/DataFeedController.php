<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 4/11/17
 */

namespace AppBundle\Controller;

use AppBundle\Entity\DataFeed;
use AppBundle\Entity\Timetable;
use AppBundle\Form\Type\DataFeedType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DataFeedController
 * @package AppBundle\Controller
 *
 * @Route("/datafeed")
 */
class DataFeedController extends Controller
{
    /**
     * @Route("/add", name="datafeed_add_example")
     */
    public function formAddExampleAction(Request $request)
    {
        $form = $this->createForm(DataFeedType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            /**
             * @var $dataFeed \AppBundle\Entity\DataFeed
             */
            $dataFeed = $form->getData();

            $timetable = new Timetable();
            $timetable->setManualEntry(120);
            $timetable->setPresetChoice(45);

            $dataFeed->setTimetable($timetable);

            $em->persist($dataFeed->getTimetable());
            $em->persist($dataFeed);
            $em->flush();

            $this->addFlash('success', 'We saved a data feed with id ' . $dataFeed->getId());
        }

        return $this->render(':datafeed:index.html.twig', [
            'myForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{datafeed}", name="datafeed_edit_example")
     */
    public function formEditExampleAction(Request $request, DataFeed $datafeed)
    {
        $form = $this->createForm(DataFeedType::class, $datafeed);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('info', 'We edited a datafeed with id ' . $datafeed->getId());

            return $this->redirectToRoute('datafeed_edit_example', ['datafeed' => 1]);
        }

        return $this->render(':datafeed:index.html.twig', [
            'myForm' => $form->createView()
        ]);
    }
}