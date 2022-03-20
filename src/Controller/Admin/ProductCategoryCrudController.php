<?php

namespace App\Controller\Admin;

use App\Entity\ProductCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductCategory::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Category name'),
            IdField::new('id')->hideOnIndex()->setDisabled()->setLabel('id product'),
            TextField::new('name'),
            FormField::addTab('Picture'),
            ImageField::new('picture')
                ->setBasePath('assets/products')
                ->setUploadDir('public/assets/products')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setFormTypeOptions(['attr' => ['accept' => 'image/jpeg', 'image/png']])
                ->setHelp('your image should be a jpeg or a png'),
        ];
    }
}
