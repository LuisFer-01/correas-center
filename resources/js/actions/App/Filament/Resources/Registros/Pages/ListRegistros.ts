import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Registros\Pages\ListRegistros::__invoke
 * @see app/Filament/Resources/Registros/Pages/ListRegistros.php:7
 * @route '/admin/registros'
 */
const ListRegistros = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListRegistros.url(options),
    method: 'get',
})

ListRegistros.definition = {
    methods: ["get","head"],
    url: '/admin/registros',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Registros\Pages\ListRegistros::__invoke
 * @see app/Filament/Resources/Registros/Pages/ListRegistros.php:7
 * @route '/admin/registros'
 */
ListRegistros.url = (options?: RouteQueryOptions) => {
    return ListRegistros.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Registros\Pages\ListRegistros::__invoke
 * @see app/Filament/Resources/Registros/Pages/ListRegistros.php:7
 * @route '/admin/registros'
 */
ListRegistros.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListRegistros.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Registros\Pages\ListRegistros::__invoke
 * @see app/Filament/Resources/Registros/Pages/ListRegistros.php:7
 * @route '/admin/registros'
 */
ListRegistros.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListRegistros.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Registros\Pages\ListRegistros::__invoke
 * @see app/Filament/Resources/Registros/Pages/ListRegistros.php:7
 * @route '/admin/registros'
 */
    const ListRegistrosForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListRegistros.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Registros\Pages\ListRegistros::__invoke
 * @see app/Filament/Resources/Registros/Pages/ListRegistros.php:7
 * @route '/admin/registros'
 */
        ListRegistrosForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListRegistros.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Registros\Pages\ListRegistros::__invoke
 * @see app/Filament/Resources/Registros/Pages/ListRegistros.php:7
 * @route '/admin/registros'
 */
        ListRegistrosForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListRegistros.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListRegistros.form = ListRegistrosForm
export default ListRegistros