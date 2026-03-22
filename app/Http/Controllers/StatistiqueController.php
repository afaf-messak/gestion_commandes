<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    // 1. Nombre de commandes par client
    public function index()
    {
        $commandesParClient = Commande::selectRaw('client_id, count(*) as count')
            ->groupBy('client_id')
            ->orderByDesc('count')
            ->get();

        $ventesParProduit = DB::table('details_commandes')
            ->select('produit_id', DB::raw('SUM(quantite * prix_unitaire) as total'))
            ->groupBy('produit_id')
            ->get();

        $commandesParMois = Commande::selectRaw('MONTH(date_commande) as mois, COUNT(*) as total')
            ->groupBy('mois')
            ->get();

        $totalCommandes = Commande::count();
        $totalClients = Client::count();
        $totalProduits = Produit::count();
        $chiffreAffaires = Commande::sum('total');

        return view('statistiques.index', compact('commandesParClient', 'ventesParProduit', 'commandesParMois', 'totalCommandes', 'totalClients', 'totalProduits', 'chiffreAffaires'));
    }

    // 2. Total des ventes par produit  
    public function ventesParProduit()
    {
        $ventesParProduit = Produit::withSum('detailCommandes', 'quantite * prix_unitaire')->get();
        return view('statistiques.ventes_par_produit', compact('ventesParProduit'));
    }

    // 3. Commandes par mois
    public function commandesParMois()
    {
        $commandesParMois = Commande::selectRaw('MONTH(date_commande)
            as mois, COUNT(*) as total')
            ->groupBy('mois')
            ->get();
        return view('statistiques.commandes_par_mois', compact('commandesParMois'));
    }


}

