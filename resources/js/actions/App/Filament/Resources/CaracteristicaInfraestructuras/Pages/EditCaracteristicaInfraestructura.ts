import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\EditCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/EditCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/{record}/edit'
 */
const EditCaracteristicaInfraestructura = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditCaracteristicaInfraestructura.url(args, options),
    method: 'get',
})

EditCaracteristicaInfraestructura.definition = {
    methods: ["get","head"],
    url: '/admin/caracteristica-infraestructuras/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\EditCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/EditCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/{record}/edit'
 */
EditCaracteristicaInfraestructura.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditCaracteristicaInfraestructura.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\EditCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/EditCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/{record}/edit'
 */
EditCaracteristicaInfraestructura.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditCaracteristicaInfraestructura.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\EditCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/EditCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/{record}/edit'
 */
EditCaracteristicaInfraestructura.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditCaracteristicaInfraestructura.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\EditCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/EditCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/{record}/edit'
 */
    const EditCaracteristicaInfraestructuraForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditCaracteristicaInfraestructura.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\EditCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/EditCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/{record}/edit'
 */
        EditCaracteristicaInfraestructuraForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditCaracteristicaInfraestructura.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\EditCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/EditCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/{record}/edit'
 */
        EditCaracteristicaInfraestructuraForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditCaracteristicaInfraestructura.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditCaracteristicaInfraestructura.form = EditCaracteristicaInfraestructuraForm
export default EditCaracteristicaInfraestructura