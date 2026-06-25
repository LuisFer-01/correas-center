import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Sucursals\Pages\ListSucursals::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/ListSucursals.php:7
 * @route '/admin/sucursals'
 */
const ListSucursals = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListSucursals.url(options),
    method: 'get',
})

ListSucursals.definition = {
    methods: ["get","head"],
    url: '/admin/sucursals',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Sucursals\Pages\ListSucursals::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/ListSucursals.php:7
 * @route '/admin/sucursals'
 */
ListSucursals.url = (options?: RouteQueryOptions) => {
    return ListSucursals.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Sucursals\Pages\ListSucursals::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/ListSucursals.php:7
 * @route '/admin/sucursals'
 */
ListSucursals.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListSucursals.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Sucursals\Pages\ListSucursals::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/ListSucursals.php:7
 * @route '/admin/sucursals'
 */
ListSucursals.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListSucursals.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Sucursals\Pages\ListSucursals::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/ListSucursals.php:7
 * @route '/admin/sucursals'
 */
    const ListSucursalsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListSucursals.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Sucursals\Pages\ListSucursals::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/ListSucursals.php:7
 * @route '/admin/sucursals'
 */
        ListSucursalsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListSucursals.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Sucursals\Pages\ListSucursals::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/ListSucursals.php:7
 * @route '/admin/sucursals'
 */
        ListSucursalsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListSucursals.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListSucursals.form = ListSucursalsForm
export default ListSucursals