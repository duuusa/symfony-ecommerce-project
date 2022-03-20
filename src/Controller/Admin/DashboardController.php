<?php

namespace App\Controller\Admin;

use App\Entity\Order;
use App\Entity\Product;
use App\Entity\ProductCategory;
use App\Entity\Store;
use App\Entity\Town;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(adminUrlGenerator::class);

        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        $this->redirect($adminUrlGenerator->setController(ProductCrudController::class)->generateUrl());

        $this->redirect($adminUrlGenerator->setController(ProductCategoryCrudController::class)->generateUrl());

        $this->redirect($adminUrlGenerator->setController(StoreCrudController::class)->generateUrl());

        $this->redirect($adminUrlGenerator->setController(TownCrudController::class)->generateUrl());

        $this->redirect($adminUrlGenerator->setController(OrderCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Admin');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
        yield MenuItem::section('Products & Categories');
        yield MenuItem::linkToCrud('Products', 'fas fa-desktop', Product::class);
        yield MenuItem::linkToCrud('Categories', 'fas fa-database', ProductCategory::class);
        yield MenuItem::section('Orders');
        yield MenuItem::linkToCrud('Orders', 'fas fa-shopping-cart', Order::class);
        yield MenuItem::section('Stores & Cities');
        yield MenuItem::linkToCrud('Stores', 'fas fa-location-arrow', Store::class);
        yield MenuItem::linkToCrud('Towns', 'fas fa-building', Town::class);
    }
}
