<?php

namespace App\Controller\Admin;

use App\Entity\Film;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class FilmCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Film::class;
    }

    public function configureFields(string $pageName): iterable
    {
        // yield IdField::new('id')->hideOnForm();
        yield TextField::new('name');
        yield TextField::new('director');
        yield AssociationField::new('category');
        yield TextEditorField::new('description');
        yield IntegerField::new('year');
        yield TextField::new('country');
        yield IntegerField::new('availability');
        yield IntegerField::new('duration');
        yield TextField::new('image_url');
        yield TextField::new('video_url');
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
