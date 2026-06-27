import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Caracteristicas\Pages\EditCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/EditCaracteristica.php:7
 * @route '/admin/caracteristicas/{record}/edit'
 */
const EditCaracteristica = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditCaracteristica.url(args, options),
    method: 'get',
})

EditCaracteristica.definition = {
    methods: ["get","head"],
    url: '/admin/caracteristicas/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Caracteristicas\Pages\EditCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/EditCaracteristica.php:7
 * @route '/admin/caracteristicas/{record}/edit'
 */
EditCaracteristica.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditCaracteristica.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Caracteristicas\Pages\EditCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/EditCaracteristica.php:7
 * @route '/admin/caracteristicas/{record}/edit'
 */
EditCaracteristica.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditCaracteristica.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Caracteristicas\Pages\EditCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/EditCaracteristica.php:7
 * @route '/admin/caracteristicas/{record}/edit'
 */
EditCaracteristica.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditCaracteristica.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Caracteristicas\Pages\EditCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/EditCaracteristica.php:7
 * @route '/admin/caracteristicas/{record}/edit'
 */
    const EditCaracteristicaForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditCaracteristica.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Caracteristicas\Pages\EditCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/EditCaracteristica.php:7
 * @route '/admin/caracteristicas/{record}/edit'
 */
        EditCaracteristicaForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditCaracteristica.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Caracteristicas\Pages\EditCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/EditCaracteristica.php:7
 * @route '/admin/caracteristicas/{record}/edit'
 */
        EditCaracteristicaForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditCaracteristica.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditCaracteristica.form = EditCaracteristicaForm
export default EditCaracteristica