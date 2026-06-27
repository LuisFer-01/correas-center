import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\GamaProductos\Pages\CreateGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/CreateGamaProducto.php:7
 * @route '/admin/gama-productos/create'
 */
const CreateGamaProducto = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateGamaProducto.url(options),
    method: 'get',
})

CreateGamaProducto.definition = {
    methods: ["get","head"],
    url: '/admin/gama-productos/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\GamaProductos\Pages\CreateGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/CreateGamaProducto.php:7
 * @route '/admin/gama-productos/create'
 */
CreateGamaProducto.url = (options?: RouteQueryOptions) => {
    return CreateGamaProducto.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\GamaProductos\Pages\CreateGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/CreateGamaProducto.php:7
 * @route '/admin/gama-productos/create'
 */
CreateGamaProducto.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateGamaProducto.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\GamaProductos\Pages\CreateGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/CreateGamaProducto.php:7
 * @route '/admin/gama-productos/create'
 */
CreateGamaProducto.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateGamaProducto.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\GamaProductos\Pages\CreateGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/CreateGamaProducto.php:7
 * @route '/admin/gama-productos/create'
 */
    const CreateGamaProductoForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateGamaProducto.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\GamaProductos\Pages\CreateGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/CreateGamaProducto.php:7
 * @route '/admin/gama-productos/create'
 */
        CreateGamaProductoForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateGamaProducto.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\GamaProductos\Pages\CreateGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/CreateGamaProducto.php:7
 * @route '/admin/gama-productos/create'
 */
        CreateGamaProductoForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateGamaProducto.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateGamaProducto.form = CreateGamaProductoForm
export default CreateGamaProducto