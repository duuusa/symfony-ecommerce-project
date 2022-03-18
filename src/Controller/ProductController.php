<?php

namespace App\Controller;

use App\Entity\ProductCategory;
use App\Repository\ProductCategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/store', name: 'app_store')]
    public function index(ProductRepository $productRepository,ProductCategoryRepository $productCategoryRepository): Response
    {
        return $this->render('product/index.html.twig', [
            'categories'=>$productCategoryRepository->findAll(),
            'products'=>$productRepository->findAll()
        ]);
    }

    #[Route('/products/{productCategory}', name: 'app_products')]
    public function show($productCategory,ProductCategoryRepository $productCategoryRepository): Response
    {
        $category = $productCategoryRepository->findOneById($productCategory);
        $products = $category->getProduct();

        return $this->render('product/showAll.html.twig', [
            'category'=>$category,
            'products'=>$products
        ]);
    }

    #[Route('/product/{id}', name: 'app_product')]
    public function single(ProductRepository $productRepository, $id): Response
    {
        $product = $productRepository->find($id);

        return $this->render('product/show.html.twig', [
            'product'=>$product
        ]);
    }
}
