<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Statistiques - Gestion Commandes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gradient" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh;">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
                <div class="container">
                        <a class="navbar-brand fw-bold fs-4" href="{{ route('commandes.index') }}">
                                <i class="fas fa-shopping-cart me-2"></i>Gestion Commandes
                        </a>
                        <div class="navbar-nav ms-auto">
                                <a class="nav-link" href="{{ route('commandes.index') }}">
                                        <i class="fas fa-list me-1"></i>Commandes
                                </a>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="nav-link btn btn-link p-0" type="submit">
                                                <i class="fas fa-sign-out-alt me-1"></i>Déconnexion
                                        </button>
                                </form>
                        </div>
                </div>
        </nav>

        <div class="container py-5">
                <!-- Hero Header -->
                <div class="row mb-5">
                        <div class="col text-center text-white">
                                <h1 class="display-4 fw-bold mb-3">
                                        <i class="fas fa-chart-line fa-2x text-warning me-3"></i>
                                        Statistiques Complètes
                                </h1>
                                <p class="lead">Vue d'ensemble de votre activité commerciale</p>
                        </div>
                </div>

                <!-- Stats Cards -->
                <div class="row g-4 mb-5">
                        <div class="col-lg-3 col-md-6">
                                <div
                                        class="card border-0 shadow-lg h-100 text-center text-white bg-primary gradient-card">
                                        <div class="card-body py-4">
                                                <i class="fas fa-shopping-cart fa-3x mb-3 opacity-75"></i>
                                                <h2 class="display-6 fw-bold mb-1">{{ $totalCommandes }}</h2>
                                                <p class="mb-0 fs-5">Total commandes</p>
                                        </div>
                                </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                                <div
                                        class="card border-0 shadow-lg h-100 text-center text-white bg-success gradient-card">
                                        <div class="card-body py-4">
                                                <i class="fas fa-users fa-3x mb-3 opacity-75"></i>
                                                <h2 class="display-6 fw-bold mb-1">{{ $totalClients }}</h2>
                                                <p class="mb-0 fs-5">Total clients</p>
                                        </div>
                                </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                                <div class="card border-0 shadow-lg h-100 text-center text-white bg-info gradient-card">
                                        <div class="card-body py-4">
                                                <i class="fas fa-box fa-3x mb-3 opacity-75"></i>
                                                <h2 class="display-6 fw-bold mb-1">{{ $totalProduits }}</h2>
                                                <p class="mb-0 fs-5">Total produits</p>
                                        </div>
                                </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                                <div
                                        class="card border-0 shadow-lg h-100 text-center text-white bg-warning gradient-card">
                                        <div class="card-body py-4">
                                                <i class="fas fa-money-bill-wave fa-3x mb-3 opacity-75"></i>
                                                <h2 class="display-6 fw-bold mb-1">
                                                        {{ number_format($chiffreAffaires ?? 0, 2) }} DHS
                                                        <p class="mb-0 fs-5">Chiffre d'affaires</p>
                                        </div>
                                </div>
                        </div>
                </div>

                <div class="row g-4">
                        <!-- Commandes par client -->
                        <div class="col-lg-6">
                                <div class="card shadow-lg border-0 h-100">
                                        <div class="card-header bg-gradient bg-warning text-dark fw-bold py-3">
                                                <i class="fas fa-user-friends me-2"></i>Commandes par client
                                        </div>
                                        <div class="card-body p-0">
                                                <div class="list-group list-group-flush list-group-hover">
                                                        @forelse($commandesParClient as $item)
                                                                <a href="#"
                                                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 py-3">
                                                                        <div>
                                                                                <h6 class="mb-1 fw-bold">Client
                                                                                        #{{ $item->client_id }}</h6>
                                                                                <small class="text-muted">Activité
                                                                                        récente</small>
                                                                        </div>
                                                                        <span
                                                                                class="badge bg-primary rounded-pill fs-6 px-3 py-2">{{ $item->count }}
                                                                                commande{{ $item->count > 1 ? 's' : '' }}</span>
                                                                </a>
                                                        @empty
                                                                <div class="text-center py-5 text-muted">
                                                                        <i class="fas fa-users-slash fa-3x mb-3"></i>
                                                                        <p>Aucune statistique disponible</p>
                                                                </div>
                                                        @endforelse
                                                </div>
                                        </div>
                                </div>
                        </div>

                        <!-- Commandes par mois -->
                        <div class="col-lg-6">
                                <div class="card shadow-lg border-0 h-100">
                                        <div class="card-header bg-gradient bg-info text-white fw-bold py-3">
                                                <i class="fas fa-calendar-alt me-2"></i>Commandes par mois
                                        </div>
                                        <div class="card-body p-0">
                                                <div class="list-group list-group-flush">
                                                        @forelse($commandesParMois as $moisData)
                                                                <a href="#"
                                                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 py-3">
                                                                        <div>
                                                                                <h6 class="mb-1">Mois {{ $moisData->mois }}</h6>
                                                                                <small
                                                                                        class="text-muted">{{ date('F', mktime(0, 0, 0, $moisData->mois, 1)) }}</small>
                                                                        </div>
                                                                        <span
                                                                                class="badge bg-success rounded-pill fs-6 px-3 py-2">{{ $moisData->total }}
                                                                                commande{{ $moisData->total > 1 ? 's' : '' }}</span>
                                                                </a>
                                                        @empty
                                                                <div class="text-center py-5 text-muted">
                                                                        <i class="fas fa-calendar-times fa-3x mb-3"></i>
                                                                        <p>Aucune donnée mensuelle</p>
                                                                </div>
                                                        @endforelse
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>

                <div class="text-center mt-5">
                        <a href="{{ route('commandes.index') }}" class="btn btn-outline-light btn-lg px-4">
                                <i class="fas fa-arrow-left me-2"></i>Retour aux commandes
                        </a>
                </div>
        </div>

        <style>
                .gradient-card {
                        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(255, 255, 255, 0.2);
                }

                .list-group-hover .list-group-item:hover {
                        background-color: rgba(0, 0, 0, 0.05);
                        transform: translateX(5px);
                        transition: all 0.2s ease;
                }

                @media (max-width: 768px) {
                        .navbar-brand {
                                font-size: 1.2rem;
                        }
                }
        </style>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>