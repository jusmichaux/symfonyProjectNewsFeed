<?php
// src/Controller/WelcomeController.php
namespace App\Controller;
use App\Entity\News;
use App\Form\NewsType;
use App\Repository\NewsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/welcome/number")
     */
    public function number()
    {
        $number = mt_rand(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    /**
     * @Route("/welcome/desktop")
     */
    public function desktop()
    {
        $mes = "Vous êtes sur le desktop";
        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->findAll();


        return $this->render('desktop.html.twig', ['news' => $news,
            ]);

        /*
         * return $this->render('news/index.html.twig', ['news' => $newsRepository->findAll()]);
         *
         */
    }   
}