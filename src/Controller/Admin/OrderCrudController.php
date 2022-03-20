<?php

namespace App\Controller\Admin;

use App\Entity\Order;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class OrderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Order::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Primary Informations'),
            IdField::new('id')->hideOnIndex()->setDisabled()->setLabel('id order'),
            AssociationField::new('user'),
            AssociationField::new('product'),
            IntegerField::new('quantity')->setFormTypeOptions([
                'attr' => [
                    'min' => 0,
                    'max' => 50,
                    'step' => 1,
                ]
            ])->setHelp('must be between 0 and 100000'),
        ];
    }

}
