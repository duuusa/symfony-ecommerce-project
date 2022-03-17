<?php

namespace App\Controller;

use App\Repository\ProductCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'User',
        ]);
    }
    public function nav(ProductCategoryRepository $productCategoryRepository)
    {
        return $this->render('partial/nav.html.twig', [
            'categories' =>$productCategoryRepository->findAll(),
        ]);
    }
    public function footer(ProductCategoryRepository $productCategoryRepository)
    {
        return $this->render('partial/footer.html.twig', [
            'categories' =>$productCategoryRepository->findAll(),
        ]);
    }
}
