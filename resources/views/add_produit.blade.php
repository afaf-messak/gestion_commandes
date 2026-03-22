<h2>Ajouter un produit </h2>

<form action="{{ route('produits.store') }}" method="POST">
    @csrf
    <label for="nom">Nom du produit :</label>
    <input type="text" name="nom" id="nom" required>

    <label for="description">Description :</label>
    <textarea name="description" id="description" required></textarea>

    <label for="prix">Prix :</label>
    <input type="number" name="prix" id="prix" step="0.01" required>

    <button type="submit">Ajouter</button>
</form>
