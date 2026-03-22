<?php

namespace App\Listeners;

use App\Events\CommandeUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\HistoriqueCommande;

class EnregistrerHistoriqueCommande
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CommandeUpdated $event): void
    {
        //
         HistoriqueCommande::create([
            'commande_id' => $event->commande->id,
            'action' => 'modification',
            'details' => json_encode($event->changes)
        ]);
    }
}
