import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Aplicacions\Pages\ListAplicacions::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/ListAplicacions.php:7
 * @route '/admin/aplicacions'
 */
const ListAplicacions = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListAplicacions.url(options),
    method: 'get',
})

ListAplicacions.definition = {
    methods: ["get","head"],
    url: '/admin/aplicacions',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Aplicacions\Pages\ListAplicacions::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/ListAplicacions.php:7
 * @route '/admin/aplicacions'
 */
ListAplicacions.url = (options?: RouteQueryOptions) => {
    return ListAplicacions.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Aplicacions\Pages\ListAplicacions::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/ListAplicacions.php:7
 * @route '/admin/aplicacions'
 */
ListAplicacions.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListAplicacions.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Aplicacions\Pages\ListAplicacions::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/ListAplicacions.php:7
 * @route '/admin/aplicacions'
 */
ListAplicacions.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListAplicacions.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Aplicacions\Pages\ListAplicacions::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/ListAplicacions.php:7
 * @route '/admin/aplicacions'
 */
    const ListAplicacionsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListAplicacions.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Aplicacions\Pages\ListAplicacions::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/ListAplicacions.php:7
 * @route '/admin/aplicacions'
 */
        ListAplicacionsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListAplicacions.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Aplicacions\Pages\ListAplicacions::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/ListAplicacions.php:7
 * @route '/admin/aplicacions'
 */
        ListAplicacionsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListAplicacions.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListAplicacions.form = ListAplicacionsForm
export default ListAplicacions