<?php

namespace App\Controller;
use App\Entity\News;
use App\Entity\Users;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class ProductController extends Controller
{
    /**
     * @Route("/product/add", name="product")
     */
    public function index()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $news = new News();
        $news->setContent('Aloe Mora');
        $news->setAuthor('Harry Potter');
        $news->setDate("TEST");
        $news->setNRating(null);
        $news->setFollowers(null);
        $news->setIsVisible(1);
        $news->setTime("TEST");

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($news);

        // actually executes the queries (i.e. the INSERT query)
        //$entityManager->flush();


        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $user = new Users();
        $user->setName('admin');
        $user->setFollowers('Lolo');
        $user->setPassword('admin');
        $user->setPlainPassword('admin');
        $user->setArticlesWritten($news);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();


        return new Response('Saved new news with id '.$news->getId().'Saved new user with id '.$user->getId());
    }

    /**
     * @Route("/product/show/{id}", name="product_showById")
     */
    public function showById($id)
    {
        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->find($id);

        if (!$news) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$news->getContent().$news->getAuthor());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $news]);
    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function showByObject(News $id)
    {
        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->find($id);

        if (!$news) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

       // return new Response('Check out this great product: '.$news->getContent().$news->getAuthor());
        return $this->render('article.html.twig', array(
            'object' => $news,
        ));
        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $news]);
    }



}
