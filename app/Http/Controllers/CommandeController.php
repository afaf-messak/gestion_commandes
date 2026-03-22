<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //afficher (index)

    public function index()
    {
        //cette line pour afficher les commandes avec les informations du client 
        //qui a passé la commande et paginer les résultats par 10 commandes par page
        $commandes = Commande::with('client')->paginate(10); // Pagination with client relation
        return view('commandes.index', compact('commandes'));
    }

    public function create()
    {
        $clients = \App\Models\Client::all();
        return view('commandes.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'client_id' => 'required|exists:clients,id',
                'date_commande' => 'required|date',
            ],
            [
                'client_id.required' => 'Le champ client est obligatoire',
                'client_id.exists' => 'Le client sélectionné n\'existe pas',
                'date_commande.required' => 'Le champ date de commande est obligatoire',
                'date_commande.date' => 'Le champ date de commande doit être une date valide',
            ]
        );

        //cette line va creer une nouvelle commande dans 
        //la base de donneé avec les donnée du formulaire dans la tabel commandes
        Commande::create([
            'client_id' => $request->client_id,
            'date_commande' => $request->date_commande,
            'total' => 0//le total de la commande sera calculé plus tard après l'ajout des produits dans les details_commandes

        ]);
        return redirect()->route('commandes.index')->with('success', 'Commande créée avec succès');
    }

    public function show($id)
    {
        $commande = Commande::with('detailCommandes.produit')->findOrFail($id);
        return view('commandes.show', compact('commande'));
    }


    public function edit($id)
    {
        $commande = Commande::findOrFail($id);
        $clients = \App\Models\Client::all();
        return view('commandes.edit', compact('commande', 'clients'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date_commande' => 'required|date',
        ]);

        //4️⃣ Déclencher l’événement dans le controller
        $commande = Commande::findOrFail($id);

        $oldValues = $commande->getOriginal(); // valeurs avant update

        $commande->update([
            'client_id' => $request->client_id,
            'date_commande' => $request->date_commande
        ]);

        $changes = $commande->getChanges();
        event(new \App\Events\CommandeUpdated($commande, $changes));

        return redirect()->route('commandes.index')->with('success', 'Commande modifiée avec succès');
    }


    public function confirmDelete($id)
    {
        $commande = Commande::findOrFail($id);
        return view('commandes.confirmDelete', compact('commande'));
    }
    public function destroy($id)
    {
        $commande = Commande::findOrFail($id);

        // Delete child detailCommandes first to avoid FK constraint
        $commande->detailCommandes()->delete();
        $commande->delete();

        return redirect()->route('commandes.index')->with('success', 'Commande supprimée avec succès');
    }
}
