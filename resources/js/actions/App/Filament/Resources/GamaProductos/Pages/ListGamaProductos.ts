import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\GamaProductos\Pages\ListGamaProductos::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/ListGamaProductos.php:7
 * @route '/admin/gama-productos'
 */
const ListGamaProductos = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListGamaProductos.url(options),
    method: 'get',
})

ListGamaProductos.definition = {
    methods: ["get","head"],
    url: '/admin/gama-productos',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\GamaProductos\Pages\ListGamaProductos::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/ListGamaProductos.php:7
 * @route '/admin/gama-productos'
 */
ListGamaProductos.url = (options?: RouteQueryOptions) => {
    return ListGamaProductos.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\GamaProductos\Pages\ListGamaProductos::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/ListGamaProductos.php:7
 * @route '/admin/gama-productos'
 */
ListGamaProductos.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListGamaProductos.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\GamaProductos\Pages\ListGamaProductos::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/ListGamaProductos.php:7
 * @route '/admin/gama-productos'
 */
ListGamaProductos.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListGamaProductos.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\GamaProductos\Pages\ListGamaProductos::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/ListGamaProductos.php:7
 * @route '/admin/gama-productos'
 */
    const ListGamaProductosForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListGamaProductos.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\GamaProductos\Pages\ListGamaProductos::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/ListGamaProductos.php:7
 * @route '/admin/gama-productos'
 */
        ListGamaProductosForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListGamaProductos.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\GamaProductos\Pages\ListGamaProductos::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/ListGamaProductos.php:7
 * @route '/admin/gama-productos'
 */
        ListGamaProductosForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListGamaProductos.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListGamaProductos.form = ListGamaProductosForm
export default ListGamaProductos