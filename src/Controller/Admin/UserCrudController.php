<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function createEntity(string $entityFqcn)
    {
        $date = new \DateTimeImmutable(); 
        $date->setTimezone(new \DateTimeZone('Europe/Paris'));

        $user = new User(); 
        $user
            ->setCreatedAt($date);
        
        return $user;
    }

    /*
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance) : void
    {
        $date = new \Datetime(); 
        $date->setTimezone(new \DateTimeZone('Europe/Paris'));

        $entityInstance->setUpdatedAt($date); 
        $entityManager->persist($entityInstance);
        $entityManager->flush();
    }
    */





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
            $user = new User(); 

            // yield EmailField::new('email');
            yield IdField::new('id')
                ->hideOnForm();
            yield TextField::new('alias');
            yield TextField::new('fullName', 'Nom')
                ->onlyOnIndex();
            yield EmailField::new('email');
            yield TextField::new('first_name', 'Prénom')
                ->hideOnIndex();
            yield TextField::new('last_name', 'Nom')
                ->hideOnIndex();
            yield ImageField::new('logo')
                ->setBasePath('uploads/logo')
                ->setUploadDir('public/uploads/logo')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]');
            /*
            yield TextField::new('password')
                ->onlyOnForms()
                ->setFormType(RepeatedType::class)
                ->setFormTypeOptions([
                    'type' => PasswordType::class,
                    'first_options' => [
                        'label'    => 'Mot de Passe',
                        'row_attr' => [
                        'class' => 'col-md-6 col-xxl-5',
                        ],
                    ],
                    'second_options' => [
                        'label'    => 'Retappez Votre mot passe',
                        'row_attr' => [
                        'class' => 'col-md-6 col-xxl-5',
                        ],
                    ],
                ],
            );
            */

            // $createdAt = DateTimeField::new('createdAt')->setFormTypeOptions([
            //             'value' =>  new \DateTimeImmutable(),

            //           ]);
            //            if (Crud::PAGE_EDIT === $pageName) {
            //                yield $createdAt->setFormTypeOption('disabled', true);
            //            } else {
            //               yield $createdAt;
            //           }

            

    }

    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
            ->disable(Action::NEW);
    }
}