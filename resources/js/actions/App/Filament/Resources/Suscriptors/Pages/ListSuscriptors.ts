import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Suscriptors\Pages\ListSuscriptors::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ListSuscriptors.php:7
 * @route '/admin/suscriptors'
 */
const ListSuscriptors = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListSuscriptors.url(options),
    method: 'get',
})

ListSuscriptors.definition = {
    methods: ["get","head"],
    url: '/admin/suscriptors',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Suscriptors\Pages\ListSuscriptors::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ListSuscriptors.php:7
 * @route '/admin/suscriptors'
 */
ListSuscriptors.url = (options?: RouteQueryOptions) => {
    return ListSuscriptors.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Suscriptors\Pages\ListSuscriptors::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ListSuscriptors.php:7
 * @route '/admin/suscriptors'
 */
ListSuscriptors.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListSuscriptors.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Suscriptors\Pages\ListSuscriptors::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ListSuscriptors.php:7
 * @route '/admin/suscriptors'
 */
ListSuscriptors.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListSuscriptors.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Suscriptors\Pages\ListSuscriptors::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ListSuscriptors.php:7
 * @route '/admin/suscriptors'
 */
    const ListSuscriptorsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListSuscriptors.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Suscriptors\Pages\ListSuscriptors::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ListSuscriptors.php:7
 * @route '/admin/suscriptors'
 */
        ListSuscriptorsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListSuscriptors.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Suscriptors\Pages\ListSuscriptors::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ListSuscriptors.php:7
 * @route '/admin/suscriptors'
 */
        ListSuscriptorsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListSuscriptors.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListSuscriptors.form = ListSuscriptorsForm
export default ListSuscriptors