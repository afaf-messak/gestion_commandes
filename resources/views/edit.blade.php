<h2>Modifier Commande</h2>

<!--form pre-rempli avec les données de la commande à modifier-->
<form action="{{ route('commandes.update', $commande->id) }}" method="POST">
        @csrf
        @method('PUT') <!--cette methode est nécessaire pour indiquer que c'est une requete de type PUT pour la mise à jour de la commande
         car les formulaires HTML ne supportent que les methodes GET et POST -->

        <label >Client :</label>
        <input type="text" name="client_id" value="{{ $commande->client_id }}" required > <!--value cest pour pré-remplir le champ avec l'id du client actuel de la commande-->

        <select name="client_id">
<!-- cette section permet de sélectionner le client -->
                @foreach ($clients as $client)
                <option value=" {{ $client->id }} " {{ $commande->client_id == $client->id ? 'selected' : '' }}> <!-- cette condition permet de pré-sélectionner le client actuel de la commande dans la liste déroulante -->
                {{ $client->nom }}<!-- Affiche le nom du client dans la liste déroulante -->
                </option>
                @endforeach

        </select>
        <label >Date de Commande :</label>
        <input type="date" name="date_commande" value="{{ $commande->date_commande }}" required >
        <button type="submit">Modifier</button>
</form>
