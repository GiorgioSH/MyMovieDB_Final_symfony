<?php

namespace App\Controller\Admin;

use App\Entity\Studio;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StudioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Studio::class;
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
