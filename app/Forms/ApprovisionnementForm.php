<?php

namespace App\Forms;
use App\User;
use App\Model\Fournisseur;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class ApprovisionnementForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nomAppro', Field::TEXT, [
                'rules' => 'required|min:5'
            ])
            ->add('four_id', Field::SELECT,[
                    'label' => 'fournisseur',
                    'choices' => $this->getfournisseur(),
                    'selected' => 'en',
                    'empty_value' => 'Veuillez selectionnez le fournisseur',
                    'rules'=>'required'
                ]
            )
            ->add('user_id', Field::SELECT,[
                    'label' => 'utilisateur',
                    'choices' => $this->getutilisateur(),
                    'selected' => 'en',
                    'empty_value' => 'Veuillez selectionnez la gestionnaire',
                    'rules'=>'required'
                ]
            )
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
    private function getfournisseur() {

        return Fournisseur::pluck('nom', 'id')->toArray();

    }
    private function getutilisateur() {

        return User::pluck('name', 'id')->toArray();

    }


}
