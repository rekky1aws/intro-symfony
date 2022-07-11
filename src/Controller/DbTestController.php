<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Tag;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DbTestController extends AbstractController
{
    #[Route('/db/test', name: 'app_db_test')]
    public function index(ManagerRegistry $doctrine): Response
    {
        // Récupération du repository des catégories.
        $repository = $doctrine->getRepository(Category::class);

        // Récupération de la liste complète de toutes les catégories.
        $categories = $repository->findAll();
        
        //  Récupération du repository des tags
        $repository = $doctrine->getRepository(Tag::class);

        // Récupération de la liste complète de tous les tags.
        $tags = $repository->findAll();

        // Inspection des listes.
        dump($categories);
        dump($tags);
        exit();
    }
}
