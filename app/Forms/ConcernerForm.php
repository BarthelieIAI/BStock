<?php

namespace App;

use App\Model\Demande;
use App\Model\Produit;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;
class ConcernerForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('Prod_id', Field::SELECT,[
                    'label' => 'Produit',
                    'choices' => $this->getProduit(),
                    'selected' => 'en',
                    'empty_value' => 'Veuillez selectionnez le produit',
                    'rules'=>'required'
                ]
            )
            ->add('Dem_id', Field::SELECT,[
                'label' => 'Demande',
                'choices' => $this->getDemande(),
                'selected' => 'en',
                'empty_value' => 'Veuillez selectionnez une demande',
                'rules'=>'required'
            ])

            ->add('Quantite', Field::NUMBER,[
                'rules'=>'required|min:1'
                ]
            )
            ->add('Date', Field::DATE,[
                'rules'=>'required|min:10'
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
        private function getProduit() {

        return Produit::pluck('libelle', 'quantite','id')->toArray();

    }
    private function getDemande() {

        return Demande::pluck('Libelle', 'id')->toArray();
    }
}
