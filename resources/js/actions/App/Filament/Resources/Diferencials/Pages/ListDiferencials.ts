import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Diferencials\Pages\ListDiferencials::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/ListDiferencials.php:7
 * @route '/admin/diferencials'
 */
const ListDiferencials = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListDiferencials.url(options),
    method: 'get',
})

ListDiferencials.definition = {
    methods: ["get","head"],
    url: '/admin/diferencials',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Diferencials\Pages\ListDiferencials::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/ListDiferencials.php:7
 * @route '/admin/diferencials'
 */
ListDiferencials.url = (options?: RouteQueryOptions) => {
    return ListDiferencials.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Diferencials\Pages\ListDiferencials::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/ListDiferencials.php:7
 * @route '/admin/diferencials'
 */
ListDiferencials.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListDiferencials.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Diferencials\Pages\ListDiferencials::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/ListDiferencials.php:7
 * @route '/admin/diferencials'
 */
ListDiferencials.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListDiferencials.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Diferencials\Pages\ListDiferencials::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/ListDiferencials.php:7
 * @route '/admin/diferencials'
 */
    const ListDiferencialsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListDiferencials.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Diferencials\Pages\ListDiferencials::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/ListDiferencials.php:7
 * @route '/admin/diferencials'
 */
        ListDiferencialsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListDiferencials.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Diferencials\Pages\ListDiferencials::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/ListDiferencials.php:7
 * @route '/admin/diferencials'
 */
        ListDiferencialsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListDiferencials.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListDiferencials.form = ListDiferencialsForm
export default ListDiferencials