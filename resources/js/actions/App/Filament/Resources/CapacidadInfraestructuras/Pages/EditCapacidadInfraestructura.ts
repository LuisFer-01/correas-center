import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\EditCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/EditCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/{record}/edit'
 */
const EditCapacidadInfraestructura = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditCapacidadInfraestructura.url(args, options),
    method: 'get',
})

EditCapacidadInfraestructura.definition = {
    methods: ["get","head"],
    url: '/admin/capacidad-infraestructuras/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\EditCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/EditCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/{record}/edit'
 */
EditCapacidadInfraestructura.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditCapacidadInfraestructura.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\EditCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/EditCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/{record}/edit'
 */
EditCapacidadInfraestructura.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditCapacidadInfraestructura.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\EditCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/EditCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/{record}/edit'
 */
EditCapacidadInfraestructura.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditCapacidadInfraestructura.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\EditCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/EditCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/{record}/edit'
 */
    const EditCapacidadInfraestructuraForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditCapacidadInfraestructura.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\EditCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/EditCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/{record}/edit'
 */
        EditCapacidadInfraestructuraForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditCapacidadInfraestructura.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\EditCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/EditCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/{record}/edit'
 */
        EditCapacidadInfraestructuraForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditCapacidadInfraestructura.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditCapacidadInfraestructura.form = EditCapacidadInfraestructuraForm
export default EditCapacidadInfraestructura