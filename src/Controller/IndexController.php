<?php

namespace App\Controller;

use App\Entity\Berichten;
use App\Form\BerichtType;
use App\Repository\BerichtenRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Include paginator interface
use Knp\Component\Pager\PaginatorInterface;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request): Response
    {
        $berichten = new Berichten();

        $form = $this->createForm(BerichtType::class, $berichten);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if($form->isSubmitted()) {

            $em->persist($berichten);
            $em->flush();

            return $this->redirectToRoute('index');

        }

        return $this->render('index/index.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/bericht", name="bericht")
     */
    public function berichten(Request $request, PaginatorInterface $paginator): Response
    {
        $em = $this->getDoctrine()->getManager();
        $berichtenRepository = $em->getRepository(Berichten::class);

        $berichten = new Berichten();

//        $form = $this->createFormBuilder($berichten)
//            ->add('Antwoorden', EntityType::class, [
//                'class' => Berichten::class,
//                'choice_label' => 'Antwoorden',
//                RadioType::class
//            ])
//            ->getForm();

        $alleberichten = $berichtenRepository->createQueryBuilder('p')
            ->getQuery()->getResult(Query::HYDRATE_ARRAY); // Selecteert alles uit de database

        $bericht = $paginator->paginate(
            $alleberichten,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            1
        );



        return $this->render('index/berichten.html.twig', [
            'berichten' => $bericht,
        ]);
    }

}
