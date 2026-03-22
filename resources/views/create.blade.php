<h2>Ajouter une nouvelle commande</h2>

<form action="{{ route('commandes.store') }}" method="POST">
        @csrf

        <label>Client :</label>

        <select name="client_id">
                <!-- cette section permet de sélectionner le client -->
                @foreach ($clients as $client)
                        <option value="{{ $client->id }}">
                                {{ $client->nom }}<!-- Affiche le nom du client dans la liste déroulante -->
                        </option>
                @endforeach

        </select>
        <label>Date de Commande :</label>
        <input type="date" name="date_commande" required>



        <button type="submit">Ajouter</button>
</form>