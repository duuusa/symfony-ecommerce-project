<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Primary Informations'),
            IdField::new('id')->hideOnIndex()->setDisabled()->setLabel('id product'),
            TextField::new('name'),
            TextField::new('description'),
            FormField::addTab('Picture'),
            ImageField::new('picture')
                ->setBasePath('assets/products')
                ->setUploadDir('public/assets/products')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setFormTypeOptions(['attr' => ['accept' => 'image/jpeg', 'image/png']])
                ->setHelp('your image should be a jpeg or a png'),
            FormField::addTab('Price & Stock'),
            NumberField::new('price'),
            IntegerField::new('stock')->setFormTypeOptions([
                'attr' => [
                    'min' => 0,
                    'max' => 100000,
                    'step' => 50,
                ]
            ])->setHelp('must be between 0 and 100000'),
            FormField::addTab('Product Category'),
            AssociationField::new('productCategory')
        ];
    }
}
