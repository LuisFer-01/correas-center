import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Caracteristicas\Pages\ListCaracteristicas::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/ListCaracteristicas.php:7
 * @route '/admin/caracteristicas'
 */
const ListCaracteristicas = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListCaracteristicas.url(options),
    method: 'get',
})

ListCaracteristicas.definition = {
    methods: ["get","head"],
    url: '/admin/caracteristicas',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Caracteristicas\Pages\ListCaracteristicas::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/ListCaracteristicas.php:7
 * @route '/admin/caracteristicas'
 */
ListCaracteristicas.url = (options?: RouteQueryOptions) => {
    return ListCaracteristicas.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Caracteristicas\Pages\ListCaracteristicas::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/ListCaracteristicas.php:7
 * @route '/admin/caracteristicas'
 */
ListCaracteristicas.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListCaracteristicas.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Caracteristicas\Pages\ListCaracteristicas::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/ListCaracteristicas.php:7
 * @route '/admin/caracteristicas'
 */
ListCaracteristicas.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListCaracteristicas.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Caracteristicas\Pages\ListCaracteristicas::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/ListCaracteristicas.php:7
 * @route '/admin/caracteristicas'
 */
    const ListCaracteristicasForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListCaracteristicas.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Caracteristicas\Pages\ListCaracteristicas::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/ListCaracteristicas.php:7
 * @route '/admin/caracteristicas'
 */
        ListCaracteristicasForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListCaracteristicas.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Caracteristicas\Pages\ListCaracteristicas::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/ListCaracteristicas.php:7
 * @route '/admin/caracteristicas'
 */
        ListCaracteristicasForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListCaracteristicas.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListCaracteristicas.form = ListCaracteristicasForm
export default ListCaracteristicas