<?php

namespace App\Forms;

use App\Model\Categeorie;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class ProduitForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('libelle', Field::TEXT, [
                'rules' => 'required|min:5'
            ])
            ->add('quantite', Field::NUMBER,[
                'rules' => 'required|min:1'
            ])
            ->add('qtecritique', Field::TEXT, [
                'rules' => 'required|min:1'

            ])
            ->add('cat_id', Field::SELECT, [
                'label' => 'Categorie',
                'choices' => $this->getCategories(),
                'selected' => 'en',
                'empty_value' => 'Veuillez selectionnez une categorie',
                'rules'=>'required'
            ])
            ->add('submit', 'submit', [
                'label' => 'valider',
                'attr' => [
                    'class' => 'btn btn-primary col-lg-2'
                ]
            ])
            ->add('clear', 'reset', [
                'label' => 'Annuler',
                'attr' => [
                    'class' => 'btn btn-primary col-lg-2'
                ]
            ]);
    }

    private function getCategories() {

         return Categeorie::pluck('libelles', 'id')->toArray();
    }
}
