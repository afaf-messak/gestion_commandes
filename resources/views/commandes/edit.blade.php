<!DOCTYPE html>
<html>

<head>
        <title>Modifier Commande #{{ $commande->id }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
        <div class="container mt-5">
                <h2>Modifier Commande #{{ $commande->id }}</h2>

                <form action="{{ route('commandes.update', $commande->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                                <label class="form-label">Client</label>
                                <select name="client_id" class="form-select" required>
                                        @foreach($clients as $client)
                                                <option value="{{ $client->id }}" {{ $commande->client_id == $client->id ? 'selected' : '' }}>
                                                        {{ $client->nom }} - {{ $client->email }}
                                                </option>
                                        @endforeach
                                </select>
                        </div>

                        <div class="mb-3">
                                <label class="form-label">Date commande</label>
                                <input type="date" name="date_commande" class="form-control"
                                        value="{{ $commande->date_commande }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
        </div>
</body>

</html>