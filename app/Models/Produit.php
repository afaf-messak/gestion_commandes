<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable=['nom','description','prix'];//cette line va permettre de remplir les champs nom,description et prix dans la base de donnée lors de la création ou la modification d'un produit
    public function detailCommandes(){//cette line va definir la relation entre le model produit et le model detailcommande, un produit peut avoir plusieurs detailcommandes
        return $this->hasMany(DetailCommande::class);//cette line va retourner tous les detailcommandes qui appartiennent à un produit
    }
    
}
