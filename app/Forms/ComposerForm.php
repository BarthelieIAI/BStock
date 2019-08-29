<?php

namespace App;
use App\Model\Approvisionnement;
use App\Model\Produit;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;
class ComposerForm extends Form
{
        public function buildForm()
    {
        $this
            ->add('prod_id', Field::SELECT,[
                    'label' => 'produit',
                    'choices' => $this->getProduit(),
                    'selected' => 'en',
                    'empty_value' => 'Veuillez selectionnez le produit',
                    'rules'=>'required'
                ]
            )
            ->add('Appro_id', Field::SELECT,[
                'label' => 'Approvisionnement',
                'choices' => $this->getApprovisionnement(),
                'selected' => 'en',
                'empty_value' => 'Veuillez selectionnez un approvisionnement',
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

        return Produit::pluck('libelle','quantite','id')->toArray();

    }
    private function getApprovisionnement() {

        return Approvisionnement::pluck('nomAppro', 'id')->toArray();
    }

}
