<h2>Confirmer la suppression de la commande</h2>
<p>Êtes-vous sûr de vouloir supprimer la commande de {{ $commande->client->nom }} passée le {{ $commande->date_commande }} ?</p><!--cette line affiche le nom du client et la date de la commande pour 
confirmer que c'est bien la commande que l'utilisateur souhaite supprimer-->

<form action="{{ route('commandes.destroy', $commande->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Supprimer</button>
</form>
<a href="{{ route('commandes.index') }}">Annuler</a> <!--cette line permet à l'utilisateur d'annuler la suppression et de revenir à la liste des commandes-->
