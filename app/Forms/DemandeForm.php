<?php

namespace App;
use App\User;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;
class DemandeForm extends Form
{
    public function buildForm()
    {
        $this

            ->add('Libelle', Field::TEXT,[
                'rules'=>'required|min:5'
            ])
            ->add('user_id', Field::SELECT,[
                    'label' => 'utilisateur',
                    'choices' => $this->getutilisateur(),
                    'selected' => 'en',
                    'empty_value' => 'Veuillez selectionnez le fournisseur',
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

    private function getutilisateur() {

        return User::pluck('name', 'id')->toArray();

    }
}
