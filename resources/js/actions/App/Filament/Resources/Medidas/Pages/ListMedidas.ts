import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Medidas\Pages\ListMedidas::__invoke
 * @see app/Filament/Resources/Medidas/Pages/ListMedidas.php:7
 * @route '/admin/medidas'
 */
const ListMedidas = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListMedidas.url(options),
    method: 'get',
})

ListMedidas.definition = {
    methods: ["get","head"],
    url: '/admin/medidas',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Medidas\Pages\ListMedidas::__invoke
 * @see app/Filament/Resources/Medidas/Pages/ListMedidas.php:7
 * @route '/admin/medidas'
 */
ListMedidas.url = (options?: RouteQueryOptions) => {
    return ListMedidas.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Medidas\Pages\ListMedidas::__invoke
 * @see app/Filament/Resources/Medidas/Pages/ListMedidas.php:7
 * @route '/admin/medidas'
 */
ListMedidas.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListMedidas.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Medidas\Pages\ListMedidas::__invoke
 * @see app/Filament/Resources/Medidas/Pages/ListMedidas.php:7
 * @route '/admin/medidas'
 */
ListMedidas.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListMedidas.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Medidas\Pages\ListMedidas::__invoke
 * @see app/Filament/Resources/Medidas/Pages/ListMedidas.php:7
 * @route '/admin/medidas'
 */
    const ListMedidasForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListMedidas.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Medidas\Pages\ListMedidas::__invoke
 * @see app/Filament/Resources/Medidas/Pages/ListMedidas.php:7
 * @route '/admin/medidas'
 */
        ListMedidasForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListMedidas.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Medidas\Pages\ListMedidas::__invoke
 * @see app/Filament/Resources/Medidas/Pages/ListMedidas.php:7
 * @route '/admin/medidas'
 */
        ListMedidasForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListMedidas.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListMedidas.form = ListMedidasForm
export default ListMedidas