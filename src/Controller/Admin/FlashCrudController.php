<?php

namespace App\Controller\Admin;

use App\Entity\Flash;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

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
}
