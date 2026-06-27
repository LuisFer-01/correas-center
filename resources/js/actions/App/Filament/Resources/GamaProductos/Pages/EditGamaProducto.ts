import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\GamaProductos\Pages\EditGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/EditGamaProducto.php:7
 * @route '/admin/gama-productos/{record}/edit'
 */
const EditGamaProducto = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditGamaProducto.url(args, options),
    method: 'get',
})

EditGamaProducto.definition = {
    methods: ["get","head"],
    url: '/admin/gama-productos/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\GamaProductos\Pages\EditGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/EditGamaProducto.php:7
 * @route '/admin/gama-productos/{record}/edit'
 */
EditGamaProducto.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { record: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    record: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        record: args.record,
                }

    return EditGamaProducto.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\GamaProductos\Pages\EditGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/EditGamaProducto.php:7
 * @route '/admin/gama-productos/{record}/edit'
 */
EditGamaProducto.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditGamaProducto.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\GamaProductos\Pages\EditGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/EditGamaProducto.php:7
 * @route '/admin/gama-productos/{record}/edit'
 */
EditGamaProducto.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditGamaProducto.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\GamaProductos\Pages\EditGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/EditGamaProducto.php:7
 * @route '/admin/gama-productos/{record}/edit'
 */
    const EditGamaProductoForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditGamaProducto.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\GamaProductos\Pages\EditGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/EditGamaProducto.php:7
 * @route '/admin/gama-productos/{record}/edit'
 */
        EditGamaProductoForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditGamaProducto.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\GamaProductos\Pages\EditGamaProducto::__invoke
 * @see app/Filament/Resources/GamaProductos/Pages/EditGamaProducto.php:7
 * @route '/admin/gama-productos/{record}/edit'
 */
        EditGamaProductoForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditGamaProducto.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditGamaProducto.form = EditGamaProductoForm
export default EditGamaProducto