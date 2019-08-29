<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;
use Spatie\Permission\Models\Permission;

class PermissionsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::SELECT, [
                'label' => 'Permission ',
                'choices' => $this->getPermissions(),
                'selected' => 'en',
                'rules'=>'required',
                'attr'=>[
                'class'=>'label col-lg-5'
                ]

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

    private function getPermissions() {

        return Permission::pluck('name', 'id')->toArray();
    }

}
