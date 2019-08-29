<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;
class FournisseurForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nom', Field::TEXT, [
                'rules' => 'required|min:3'
            ])
            ->add('prenom', Field::TEXT,[
                'rules'=>'required|min:0'
            ])
            ->add('tel',Field::NUMBER,[
                'rules'=>'required|min:8'

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
}
