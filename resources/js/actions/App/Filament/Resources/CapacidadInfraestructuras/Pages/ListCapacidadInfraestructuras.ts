import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\ListCapacidadInfraestructuras::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/ListCapacidadInfraestructuras.php:7
 * @route '/admin/capacidad-infraestructuras'
 */
const ListCapacidadInfraestructuras = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListCapacidadInfraestructuras.url(options),
    method: 'get',
})

ListCapacidadInfraestructuras.definition = {
    methods: ["get","head"],
    url: '/admin/capacidad-infraestructuras',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\ListCapacidadInfraestructuras::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/ListCapacidadInfraestructuras.php:7
 * @route '/admin/capacidad-infraestructuras'
 */
ListCapacidadInfraestructuras.url = (options?: RouteQueryOptions) => {
    return ListCapacidadInfraestructuras.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\ListCapacidadInfraestructuras::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/ListCapacidadInfraestructuras.php:7
 * @route '/admin/capacidad-infraestructuras'
 */
ListCapacidadInfraestructuras.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListCapacidadInfraestructuras.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\ListCapacidadInfraestructuras::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/ListCapacidadInfraestructuras.php:7
 * @route '/admin/capacidad-infraestructuras'
 */
ListCapacidadInfraestructuras.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListCapacidadInfraestructuras.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\ListCapacidadInfraestructuras::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/ListCapacidadInfraestructuras.php:7
 * @route '/admin/capacidad-infraestructuras'
 */
    const ListCapacidadInfraestructurasForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListCapacidadInfraestructuras.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\ListCapacidadInfraestructuras::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/ListCapacidadInfraestructuras.php:7
 * @route '/admin/capacidad-infraestructuras'
 */
        ListCapacidadInfraestructurasForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListCapacidadInfraestructuras.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\ListCapacidadInfraestructuras::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/ListCapacidadInfraestructuras.php:7
 * @route '/admin/capacidad-infraestructuras'
 */
        ListCapacidadInfraestructurasForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListCapacidadInfraestructuras.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListCapacidadInfraestructuras.form = ListCapacidadInfraestructurasForm
export default ListCapacidadInfraestructuras