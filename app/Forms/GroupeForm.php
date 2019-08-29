<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;
class GroupeForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('titre', Field::TEXT, [
                'rules' => 'required|min:5'
            ])
            ->add('description', Field::TEXT,[
                'rules'=>'required|min:0'
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
