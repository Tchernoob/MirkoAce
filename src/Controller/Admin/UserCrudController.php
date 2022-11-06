<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    // /*
    // public function configureFields(string $pageName): iterable
    // {
    //     return [
    //         IdField::new('id'),
    //         TextField::new('title'),
    //         TextEditorField::new('description'),
    //     ];
    // }
    // */

    public function configureFields(string $pageName): iterable
    {
        return [
            // yield EmailField::new('email');
            yield IdField::new('id')
                ->hideOnForm(),
            yield TextField::new('alias'),
            yield TextField::new('fullName')
                ->onlyOnIndex(),
            yield TextField::new('email'),
            yield TextField::new('first_name')
                ->hideOnIndex(),
            yield TextField::new('last_name')
                ->hideOnIndex(),
            yield ImageField::new('logo')
                ->setBasePath('uploads/logo')
                ->setUploadDir('public/uploads/logo')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
        ];
    }
}
