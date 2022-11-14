<?php

namespace App\Controller\Admin;

use App\Entity\Flash;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FlashCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Flash::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */

    public function configureFields(string $pageName): iterable
    {
        return [
            
            yield IdField::new('id')
                ->hideOnForm(),
            yield TextField::new('title', 'Titre du Flash'),
            yield AssociationField::new('id_category', 'Catégorie'),
            yield AssociationField::new('drawer', 'Dessinateur'),
            yield ImageField::new('image')
                ->setBasePath('uploads/flash')
                ->setUploadDir('public/uploads/flash')
                // ->setUploadDir('uploads/flash')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            yield TextField::new('year', 'Année'),
            yield BooleanField::new('available', 'Disponibilité'),
        ];
    }
}
