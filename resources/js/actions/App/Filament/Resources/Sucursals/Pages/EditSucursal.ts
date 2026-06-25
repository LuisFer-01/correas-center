import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Sucursals\Pages\EditSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/EditSucursal.php:7
 * @route '/admin/sucursals/{record}/edit'
 */
const EditSucursal = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditSucursal.url(args, options),
    method: 'get',
})

EditSucursal.definition = {
    methods: ["get","head"],
    url: '/admin/sucursals/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Sucursals\Pages\EditSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/EditSucursal.php:7
 * @route '/admin/sucursals/{record}/edit'
 */
EditSucursal.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditSucursal.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Sucursals\Pages\EditSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/EditSucursal.php:7
 * @route '/admin/sucursals/{record}/edit'
 */
EditSucursal.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditSucursal.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Sucursals\Pages\EditSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/EditSucursal.php:7
 * @route '/admin/sucursals/{record}/edit'
 */
EditSucursal.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditSucursal.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Sucursals\Pages\EditSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/EditSucursal.php:7
 * @route '/admin/sucursals/{record}/edit'
 */
    const EditSucursalForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditSucursal.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Sucursals\Pages\EditSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/EditSucursal.php:7
 * @route '/admin/sucursals/{record}/edit'
 */
        EditSucursalForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditSucursal.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Sucursals\Pages\EditSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/EditSucursal.php:7
 * @route '/admin/sucursals/{record}/edit'
 */
        EditSucursalForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditSucursal.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditSucursal.form = EditSucursalForm
export default EditSucursal