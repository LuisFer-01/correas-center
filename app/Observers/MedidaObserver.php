<?php

namespace App\Observers;

use App\Models\Medida;

class MedidaObserver
{
    public function creating(Medida $medida): void
    {
        // Validar que magnitud sea consistente con el tipo de medida
        if ($medida->magnitud !== null && $medida->magnitud < 0) {
            throw new \InvalidArgumentException('La magnitud no puede ser negativa');
        }
    }

    public function updating(Medida $medida): void
    {
        if ($medida->magnitud !== null && $medida->magnitud < 0) {
            throw new \InvalidArgumentException('La magnitud no puede ser negativa');
        }
    }
}
