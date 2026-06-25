import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Footers\Pages\ListFooters::__invoke
 * @see app/Filament/Resources/Footers/Pages/ListFooters.php:7
 * @route '/admin/footers'
 */
const ListFooters = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListFooters.url(options),
    method: 'get',
})

ListFooters.definition = {
    methods: ["get","head"],
    url: '/admin/footers',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Footers\Pages\ListFooters::__invoke
 * @see app/Filament/Resources/Footers/Pages/ListFooters.php:7
 * @route '/admin/footers'
 */
ListFooters.url = (options?: RouteQueryOptions) => {
    return ListFooters.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Footers\Pages\ListFooters::__invoke
 * @see app/Filament/Resources/Footers/Pages/ListFooters.php:7
 * @route '/admin/footers'
 */
ListFooters.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListFooters.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Footers\Pages\ListFooters::__invoke
 * @see app/Filament/Resources/Footers/Pages/ListFooters.php:7
 * @route '/admin/footers'
 */
ListFooters.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListFooters.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Footers\Pages\ListFooters::__invoke
 * @see app/Filament/Resources/Footers/Pages/ListFooters.php:7
 * @route '/admin/footers'
 */
    const ListFootersForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListFooters.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Footers\Pages\ListFooters::__invoke
 * @see app/Filament/Resources/Footers/Pages/ListFooters.php:7
 * @route '/admin/footers'
 */
        ListFootersForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListFooters.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Footers\Pages\ListFooters::__invoke
 * @see app/Filament/Resources/Footers/Pages/ListFooters.php:7
 * @route '/admin/footers'
 */
        ListFootersForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListFooters.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListFooters.form = ListFootersForm
export default ListFooters