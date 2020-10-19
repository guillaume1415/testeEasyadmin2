<?php


namespace App\Controller\Admin;


use App\Entity\Category;
use App\Entity\Post;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(PostCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('TesteEasyadmin2');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Important');
        yield MenuItem::linkToCrud('posts', 'fa fa-file-pdf',Post::class);
        yield MenuItem::linkToCrud('categories', 'fa fa-file-word',Category::class);
        // yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);
    }
}



