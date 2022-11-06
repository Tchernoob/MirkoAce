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
            yield TextField::new('title'),
            yield AssociationField::new('id_category'),
            yield AssociationField::new('drawer'),
            yield ImageField::new('image')
                ->setBasePath('uploads/flash')
                ->setUploadDir('public/uploads/flash')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            yield TextField::new('year'),
            yield BooleanField::new('available'),
        ];
    }
}
