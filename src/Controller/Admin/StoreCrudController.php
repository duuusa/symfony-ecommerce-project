<?php

namespace App\Controller\Admin;

use App\Entity\Store;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StoreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Store::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Store Name'),
            IdField::new('id')->hideOnIndex()->setDisabled()->setLabel('id store'),
            TextField::new('name'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
            FormField::addTab('Picture Store'),
            ImageField::new('picture')
                ->setBasePath('assets/products')
                ->setUploadDir('public/assets/products')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/jpeg', 'image/png'
                    ]
                ])->setHelp('your image should be a jpeg or a png'),
            FormField::addTab('Store Town'),
            AssociationField::new('town')
        ];
    }
}
