@php
    // ✅ En Filament, $get está disponible en las vistas de formularios
    // y permite obtener el valor de otros campos de forma reactiva
    $url = $get('mapa_incrustado');
@endphp

<div class="mt-4">
    <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3 mb-2">
        <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
            Previsualización del Mapa
        </span>
    </label>

    @if($url)
        @if(str_contains($url, 'google.com/maps') || str_contains($url, 'google.com'))
            {{-- ✅ URL válida de Google Maps --}}
            <div class="rounded-lg overflow-hidden border-2 border-gray-200 dark:border-gray-700 shadow-sm">
                <iframe
                    src="{{ $url }}"
                    width="100%"
                    height="400"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                ✅ Mapa cargado correctamente desde Google Maps
            </p>
        @else
            {{-- ⚠️ URL no válida --}}
            <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg border-l-4 border-red-500">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-red-800 dark:text-red-200">
                            URL inválida
                        </p>
                        <p class="text-sm text-red-700 dark:text-red-300 mt-1">
                            La URL no parece ser de Google Maps. Asegúrate de copiar la URL completa del iframe de Google Maps (debe contener <code>google.com/maps</code>).
                        </p>
                    </div>
                </div>
            </div>
        @endif
    @else
        {{-- 📍 Mensaje cuando no hay URL --}}
        <div class="bg-gray-50 dark:bg-gray-800/50 p-10 text-center rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-700">
            <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                Ingresa la URL del mapa para ver la previsualización
            </p>
            <p class="text-xs text-gray-500 dark:text-gray-500 mt-2">
                La previsualización aparecerá automáticamente al salir del campo de URL
            </p>
        </div>
    @endif
</div>
