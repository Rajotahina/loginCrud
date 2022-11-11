<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\category;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{   
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
        
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(ProductCrudController::class)
        ->generateUrl();
        return $this->redirect($url);
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

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
            ->setTitle('Exercice');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('E-commerce');
        yield MenuItem::section('Product');
        yield MenuItem::subMenu('Actions' ,'fas fas-bars')->setSubItems([
            MenuItem::linkToCrud('Create product' ,'fas fa-plus' ,Product::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('show product' ,'fas fa-eye' ,Product::class)
        ]);

        yield MenuItem::subMenu('Categorie' ,'fas fas-bars')->setSubItems([
            MenuItem::linkToCrud('Create Categorie' ,'fas fa-plus' ,category::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('show categories' ,'fas fa-eye' ,category::class)
        ]);
         yield MenuItem::linkToCrud('utilisateur', 'fa-solid fa-users' ,Admin::class );
        
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
