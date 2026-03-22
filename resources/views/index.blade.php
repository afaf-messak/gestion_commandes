<h2>Liste des commandes</h2>

<table border="1">
        <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Date</th>
                <th>Total</th>
        </tr>

        @foreach ($commandes as $cmd)

                <tr>
                        <td>{{ $cmd->id }}</td>
                        <td>{{ $cmd->client->nom }}</td>
                        <td>{{ $cmd->date_commande }}</td>
                        <td>{{ $cmd->total }}</td>
                </tr>

        @endforeach
</table>

<!--Pagination-->
{{ $commandes->links() }}