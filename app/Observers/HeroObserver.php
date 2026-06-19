<?php

namespace App\Observers;

use App\Models\Hero;

class HeroObserver
{
    public function creating(Hero $hero): void
    {
        $this->validarCTAs($hero);
    }

    public function updating(Hero $hero): void
    {
        $this->validarCTAs($hero);
    }

    private function validarCTAs(Hero $hero): void
    {
        // Si hay texto de CTA primario, debe tener href
        if (!empty($hero->cta_primary_text) && empty($hero->cta_primary_href)) {
            throw new \InvalidArgumentException('El CTA primario requiere una URL (href)');
        }

        // Si hay texto de CTA secundario, debe tener href
        if (!empty($hero->cta_secondary_text) && empty($hero->cta_secondary_href)) {
            throw new \InvalidArgumentException('El CTA secundario requiere una URL (href)');
        }

        // Validar formato de URLs
        if (!empty($hero->cta_primary_href) && !filter_var($hero->cta_primary_href, FILTER_VALIDATE_URL) && !str_starts_with($hero->cta_primary_href, '/')) {
            throw new \InvalidArgumentException('La URL del CTA primario no es válida');
        }

        if (!empty($hero->cta_secondary_href) && !filter_var($hero->cta_secondary_href, FILTER_VALIDATE_URL) && !str_starts_with($hero->cta_secondary_href, '/')) {
            throw new \InvalidArgumentException('La URL del CTA secundario no es válida');
        }
    }
}
