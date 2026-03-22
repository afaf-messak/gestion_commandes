<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes - Gestion Commandes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('commandes.index') }}">
                <i class="fas fa-shopping-cart me-2"></i>Gestion Commandes
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('statistiques.index') }}">
                    <i class="fas fa-chart-bar me-1"></i>Statistiques
                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="nav-link btn btn-link p-0 text-white" type="submit">
                        <i class="fas fa-sign-out-alt me-1"></i>Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4 py-3">
        <!-- Title -->
        <h1 class="h2 mb-4 fw-bold text-dark">
            <i class="fas fa-list text-primary me-2"></i>Liste des commandes
        </h1>

        <!-- Buttons BELOW title but ABOVE table -->
        <div class="d-flex justify-content-end mb-4 gap-2">
            <a href="{{ route('commandes.create') }}" class="btn btn-success">
                <i class="fas fa-plus me-1"></i>Ajouter commande
            </a>
            <a href="{{ route('statistiques.index') }}" class="btn btn-info">
                <i class="fas fa-chart-bar me-1"></i>Statistiques
            </a>
        </div>

        @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
        @endif

        <!-- Table -->
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($commandes as $cmd)
                                <tr>
                                    <td class="fw-bold">{{ $cmd->id }}</td>
                                    <td>{{ $cmd->client->nom }}</td>
                                    <td>{{ \Carbon\Carbon::parse($cmd->date_commande)->format('d/m/Y') }}</td>
                                    <td class="fw-bold text-success">{{ number_format($cmd->total, 2) }} DH</td>
                                    <td>
                                        <a href="{{ route('commandes.show', $cmd->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('commandes.edit', $cmd->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('commandes.destroy', $cmd->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Supprimer?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3"></i>
                                        <p>Aucune commande trouvée</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination BELOW table -->
        <div class="mt-4 text-center">
            {{ $commandes->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
