import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\ListCaracteristicaInfraestructuras::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/ListCaracteristicaInfraestructuras.php:7
 * @route '/admin/caracteristica-infraestructuras'
 */
const ListCaracteristicaInfraestructuras = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListCaracteristicaInfraestructuras.url(options),
    method: 'get',
})

ListCaracteristicaInfraestructuras.definition = {
    methods: ["get","head"],
    url: '/admin/caracteristica-infraestructuras',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\ListCaracteristicaInfraestructuras::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/ListCaracteristicaInfraestructuras.php:7
 * @route '/admin/caracteristica-infraestructuras'
 */
ListCaracteristicaInfraestructuras.url = (options?: RouteQueryOptions) => {
    return ListCaracteristicaInfraestructuras.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\ListCaracteristicaInfraestructuras::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/ListCaracteristicaInfraestructuras.php:7
 * @route '/admin/caracteristica-infraestructuras'
 */
ListCaracteristicaInfraestructuras.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListCaracteristicaInfraestructuras.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\ListCaracteristicaInfraestructuras::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/ListCaracteristicaInfraestructuras.php:7
 * @route '/admin/caracteristica-infraestructuras'
 */
ListCaracteristicaInfraestructuras.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListCaracteristicaInfraestructuras.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\ListCaracteristicaInfraestructuras::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/ListCaracteristicaInfraestructuras.php:7
 * @route '/admin/caracteristica-infraestructuras'
 */
    const ListCaracteristicaInfraestructurasForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListCaracteristicaInfraestructuras.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\ListCaracteristicaInfraestructuras::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/ListCaracteristicaInfraestructuras.php:7
 * @route '/admin/caracteristica-infraestructuras'
 */
        ListCaracteristicaInfraestructurasForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListCaracteristicaInfraestructuras.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\ListCaracteristicaInfraestructuras::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/ListCaracteristicaInfraestructuras.php:7
 * @route '/admin/caracteristica-infraestructuras'
 */
        ListCaracteristicaInfraestructurasForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListCaracteristicaInfraestructuras.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListCaracteristicaInfraestructuras.form = ListCaracteristicaInfraestructurasForm
export default ListCaracteristicaInfraestructuras