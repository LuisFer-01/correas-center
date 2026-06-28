import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Industrias\Pages\ListIndustrias::__invoke
 * @see app/Filament/Resources/Industrias/Pages/ListIndustrias.php:7
 * @route '/admin/industrias'
 */
const ListIndustrias = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListIndustrias.url(options),
    method: 'get',
})

ListIndustrias.definition = {
    methods: ["get","head"],
    url: '/admin/industrias',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Industrias\Pages\ListIndustrias::__invoke
 * @see app/Filament/Resources/Industrias/Pages/ListIndustrias.php:7
 * @route '/admin/industrias'
 */
ListIndustrias.url = (options?: RouteQueryOptions) => {
    return ListIndustrias.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Industrias\Pages\ListIndustrias::__invoke
 * @see app/Filament/Resources/Industrias/Pages/ListIndustrias.php:7
 * @route '/admin/industrias'
 */
ListIndustrias.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListIndustrias.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Industrias\Pages\ListIndustrias::__invoke
 * @see app/Filament/Resources/Industrias/Pages/ListIndustrias.php:7
 * @route '/admin/industrias'
 */
ListIndustrias.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListIndustrias.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Industrias\Pages\ListIndustrias::__invoke
 * @see app/Filament/Resources/Industrias/Pages/ListIndustrias.php:7
 * @route '/admin/industrias'
 */
    const ListIndustriasForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListIndustrias.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Industrias\Pages\ListIndustrias::__invoke
 * @see app/Filament/Resources/Industrias/Pages/ListIndustrias.php:7
 * @route '/admin/industrias'
 */
        ListIndustriasForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListIndustrias.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Industrias\Pages\ListIndustrias::__invoke
 * @see app/Filament/Resources/Industrias/Pages/ListIndustrias.php:7
 * @route '/admin/industrias'
 */
        ListIndustriasForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListIndustrias.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListIndustrias.form = ListIndustriasForm
export default ListIndustrias