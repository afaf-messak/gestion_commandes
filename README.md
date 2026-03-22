# 🚀 Gestion des Commandes

[![Laravel](https://img.shields.io/badge/Laravel-11.x-ff4444?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777bb4?style=for-the-badge&logo=php)](https://php.net)


**Système de gestion complète des commandes clients avec suivi historique et statistiques.**

## 📋 Table des Matières
- [Description](#description)
- [Fonctionnalités](#fonctionnalités)
- [Prérequis](#prérequis)
- [Installation](#installation)
- [Utilisation](#utilisation)
- [Structure du Projet](#structure-du-projet)
- [Contribuer](#contribuer)


## 📖 Description
Gestion des Commandes est une application web développée avec **Laravel**  pour la gestion complète des commandes clients. Elle permet de gérer les clients, produits, commandes (avec détails), suivi historique des modifications des commandes via événements/listeners, et tableaux de bord statistiques.

Idéal pour les PME gérant des stocks et commandes.

## ✨ Fonctionnalités
- 👥 **Gestion Clients** : CRUD complet (create/read/update/delete)
- 📦 **Gestion Produits** : Ajout, édition, suppression de produits avec confirmation
- 🛒 **Gestion Commandes** : Création de commandes avec détails (lignes multiples), édition, suppression
- 📊 **Statistiques** : Dashboard avec métriques des commandes
- 📈 **Historique Automatique** : Enregistrement des modifications via Events/Listeners
- 🔐 **Authentification** : Login sécurisé (custom controller)
- 🎨 **Interface** : Bootstrap + Vite pour un design responsive

4. **Configuration** :
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Éditez `.env` :
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=gestion_commandes
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Migrations et Seeders** :
   ```bash
   php artisan migrate --seed
   ```

6. **Lancer le serveur** :
   ```bash
   php artisan serve
   ```
   Ouvrez [http://127.0.0.1:8000](http://127.0.0.1:8000)

## 💻 Utilisation
- **Login** : `admin@example.com` / `password` (créé par seeder)
- **Dashboard** : Accès aux clients/produits/commandes/stats
- **Exemple de flux** :
  1. Ajouter clients/produits
  2. Créer commande → Ajouter lignes (produits/quantités)
  3. Modifier commande → Historique auto-mis à jour
  4. Consulter stats

**Resultat**
![alt text](image-6.png) <!--Login-->
![alt text](image.png)
![alt text](image-1.png)
![alt text](image-2.png)
![alt text](image-3.png)
![alt text](image-4.png)
![alt text](image-5.png)
## 🗂️ Structure du Projet
```
gestion_commandes/
├── app/
│   ├── Http/Controllers/     # CommandeController, StatistiqueController, LoginController
│   ├── Models/               # Client, Produit, Commande, DetailCommande, HistoriqueCommande
│   ├── Events/               # CommandeUpdated
│   └── Listeners/            # EnregistrerHistoriqueCommande
├── database/
│   ├── migrations/           # Tables users, clients, produits, commandes, details, historique
│   └── seeders/              # Tous les seeders
├── resources/views/          # Blade templates organisées (commandes/, statistiques/, auth/)
├── routes/web.php
└── ...
```

*Développé  par AfAf Messak avec ❤️ pour la gestion efficace des commandes.*
