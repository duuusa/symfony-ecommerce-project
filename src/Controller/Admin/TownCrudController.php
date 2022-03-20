<?php

namespace App\Controller\Admin;

use App\Entity\Town;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TownCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Town::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Town Name'),
            IdField::new('id')->hideOnIndex()->setDisabled()->setLabel('id product'),
            TextField::new('name'),
            FormField::addTab('Town Population'),
            IntegerField::new('population')->setFormTypeOptions([
                'attr' => [
                    'min' => 0,
                    'step' => 5000,
                ]
            ])->setHelp('must be > 0'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
            FormField::addTab('Town Stores'),
            AssociationField::new('stores')
        ];
    }
}
