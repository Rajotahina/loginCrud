<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class AdminCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('username'),
            TextField::new('password'), 
        ];
    }
}
