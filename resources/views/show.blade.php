<h2>Détails de la commande</h2>

<p><strong>Client :</strong> {{ $commande->client->nom }}</p><!--cette line affiche le nom du client qui a passé la commande en accédant à la relation client définie dans le model commande-->
<p><strong>Date de Commande :</strong> {{ $commande->date_commande }}</p>
<p><strong>Total :</strong> {{ $commande->total }}</p>
<h3>Détails des produits commandés :</h3>

<table border="1">
        <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
        </tr>
        @foreach ($commande->details_produits as $detail) <!--cette line va parcourir tous les détails de produits associés à la commande en accédant à la relation details_produits définie dans le model commande-->
        <tr>
                <td>{{ $detail->produit->nom }}</td><!--cette line affiche le nom du produit en accédant à la relation produit définie dans le model detailcommande-->
                <td>{{ $detail->quantite }}</td>
                <td>{{ $detail->prix_unitaire }}</td>
                <td>{{ $detail->quantite * $detail->prix_unitaire }}</td><!--cette line calcule le total pour chaque produit en multipliant la quantité par le prix unitaire-->
        </tr>
        @endforeach
</table>
