<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable=['nom','email','telephone'];//cette line va permettre de remplir les champs nom,email et telephone dans la base de donnée lors de la création ou la modification d'un client
    public function commandes(){//cette line va definir la relation entre le model client et le model commande, un client peut avoir plusieurs commandes
        return $this->hasMany(Commande::class);//cette line va retourner toutes les commandes qui appartiennent à un client
    }
    

}
