import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\TipoMedidas\Pages\ListTipoMedidas::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/ListTipoMedidas.php:7
 * @route '/admin/tipo-medidas'
 */
const ListTipoMedidas = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListTipoMedidas.url(options),
    method: 'get',
})

ListTipoMedidas.definition = {
    methods: ["get","head"],
    url: '/admin/tipo-medidas',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\TipoMedidas\Pages\ListTipoMedidas::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/ListTipoMedidas.php:7
 * @route '/admin/tipo-medidas'
 */
ListTipoMedidas.url = (options?: RouteQueryOptions) => {
    return ListTipoMedidas.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\TipoMedidas\Pages\ListTipoMedidas::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/ListTipoMedidas.php:7
 * @route '/admin/tipo-medidas'
 */
ListTipoMedidas.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListTipoMedidas.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\TipoMedidas\Pages\ListTipoMedidas::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/ListTipoMedidas.php:7
 * @route '/admin/tipo-medidas'
 */
ListTipoMedidas.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListTipoMedidas.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\TipoMedidas\Pages\ListTipoMedidas::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/ListTipoMedidas.php:7
 * @route '/admin/tipo-medidas'
 */
    const ListTipoMedidasForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListTipoMedidas.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\TipoMedidas\Pages\ListTipoMedidas::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/ListTipoMedidas.php:7
 * @route '/admin/tipo-medidas'
 */
        ListTipoMedidasForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListTipoMedidas.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\TipoMedidas\Pages\ListTipoMedidas::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/ListTipoMedidas.php:7
 * @route '/admin/tipo-medidas'
 */
        ListTipoMedidasForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListTipoMedidas.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListTipoMedidas.form = ListTipoMedidasForm
export default ListTipoMedidas