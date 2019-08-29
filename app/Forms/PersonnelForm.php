<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;
class PersonnelForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'rules' => 'required|min:3'
            ])

            ->add('tel', Field::NUMBER,[
                'rules'=>'required|min:8'

            ])
            ->add('email', Field::TEXT,[
                'rules'=>'required|min:10'

            ])
            ->add('password', Field::PASSWORD, [
                'rules' => 'required|min:5|confirmed'
            ])
            ->add('password_confirmation',Field::PASSWORD,[
                'label' => 'Confirmer le mot de passe',
                'rules'=>'required'
    ])
            ->add('fonction', Field::TEXT,[
                'rules'=>'required|min:5'
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
