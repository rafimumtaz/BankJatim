<?php

namespace App\Livewire;

use App\Models\Promo;
use Livewire\Component;

class PromoSection extends Component
{
    public function render()
    {
        $promos = Promo::with('category')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('livewire.promo-section', [
            'promos' => $promos
        ]);
    }
}
