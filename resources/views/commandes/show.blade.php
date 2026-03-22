<!DOCTYPE html>
<html>

<head>
        <title>Détails Commande #{{ $commande->id }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
        <div class="container mt-5">
                <div class="row">
                        <div class="col-md-8">
                                <h2>Détails Commande #{{ $commande->id }}</h2>
                                <div class="card">
                                        <div class="card-body">
                                                <p><strong>Client:</strong> {{ $commande->client->nom }}</p>
                                                <p><strong>Date:</strong> {{ $commande->date_commande }}</p>
                                                <p><strong>Total:</strong> {{ number_format($commande->total, 2) }} DH
                                                </p>
                                        </div>
                                </div>

                                <h4 class="mt-4">Produits:</h4>
                                @if($commande->detailCommandes->count() > 0)
                                        <table class="table table-striped">
                                                <thead>
                                                        <tr>
                                                                <th>Produit</th>
                                                                <th>Quantité</th>
                                                                <th>Prix unitaire</th>
                                                                <th>Total</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach($commande->detailCommandes as $detail)
                                                                <tr>
                                                                        <td>{{ $detail->produit->nom }}</td>
                                                                        <td>{{ $detail->quantite }}</td>
                                                                        <td>{{ number_format($detail->prix_unitaire, 2) }} DH</td>
                                                                        <td>{{ number_format($detail->total, 2) }} DH</td>
                                                                </tr>
                                                        @endforeach
                                                </tbody>
                                        </table>
                                @else
                                        <p class="alert alert-info">Aucun produit dans cette commande.</p>
                                @endif
                        </div>
                </div>

                <div class="mt-3">
                        <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Retour liste</a>
                </div>
        </div>
</body>

</html>