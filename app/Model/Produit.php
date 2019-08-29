<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model
{
    use SoftDeletes;
    protected $table = "produit";
    protected $fillable = ['libelle', 'quantite',' qteCritique','cat_id'];


    public function getDanger()
    {
        $p = Produit::all();
        $produits = [];
        foreach ($p as $produit) {
            if ($produit->quantite <= $produit->qteCritique)
                array_push($produits, $produit);
        }
        $i=0;
        /*for($i;$i<$p.count(); $i++)
        {
            $products[i]['etat']=($p[i]['quantite']<$p[i]['qtecritique'])? 'danger':'disponible';
        }
        dd($produits);*/
        return $produits;
    }
}