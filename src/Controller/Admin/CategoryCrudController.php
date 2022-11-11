<?php

namespace App\Controller\Admin;

use App\Entity\category;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;


class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            BooleanField::new('active'),
            DateTimeField::new('updatedAt')->hideOnForm(),
        ];
    }

    
    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if(!$entityInstance instanceof category) return;
        $entityInstance->getUpdatedAt(new \DateTimeImmutable() );
        parent::persistEntity($em ,$entityInstance);
    }
    
}
