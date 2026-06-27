import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Composicions\Pages\ListComposicions::__invoke
 * @see app/Filament/Resources/Composicions/Pages/ListComposicions.php:7
 * @route '/admin/composicions'
 */
const ListComposicions = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListComposicions.url(options),
    method: 'get',
})

ListComposicions.definition = {
    methods: ["get","head"],
    url: '/admin/composicions',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Composicions\Pages\ListComposicions::__invoke
 * @see app/Filament/Resources/Composicions/Pages/ListComposicions.php:7
 * @route '/admin/composicions'
 */
ListComposicions.url = (options?: RouteQueryOptions) => {
    return ListComposicions.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Composicions\Pages\ListComposicions::__invoke
 * @see app/Filament/Resources/Composicions/Pages/ListComposicions.php:7
 * @route '/admin/composicions'
 */
ListComposicions.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListComposicions.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Composicions\Pages\ListComposicions::__invoke
 * @see app/Filament/Resources/Composicions/Pages/ListComposicions.php:7
 * @route '/admin/composicions'
 */
ListComposicions.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListComposicions.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Composicions\Pages\ListComposicions::__invoke
 * @see app/Filament/Resources/Composicions/Pages/ListComposicions.php:7
 * @route '/admin/composicions'
 */
    const ListComposicionsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListComposicions.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Composicions\Pages\ListComposicions::__invoke
 * @see app/Filament/Resources/Composicions/Pages/ListComposicions.php:7
 * @route '/admin/composicions'
 */
        ListComposicionsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListComposicions.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Composicions\Pages\ListComposicions::__invoke
 * @see app/Filament/Resources/Composicions/Pages/ListComposicions.php:7
 * @route '/admin/composicions'
 */
        ListComposicionsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListComposicions.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListComposicions.form = ListComposicionsForm
export default ListComposicions