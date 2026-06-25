import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\EditPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/EditPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/{record}/edit'
 */
const EditPorqueElegirnos = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditPorqueElegirnos.url(args, options),
    method: 'get',
})

EditPorqueElegirnos.definition = {
    methods: ["get","head"],
    url: '/admin/porque-elegirnos/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\EditPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/EditPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/{record}/edit'
 */
EditPorqueElegirnos.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditPorqueElegirnos.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\EditPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/EditPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/{record}/edit'
 */
EditPorqueElegirnos.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditPorqueElegirnos.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\EditPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/EditPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/{record}/edit'
 */
EditPorqueElegirnos.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditPorqueElegirnos.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\EditPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/EditPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/{record}/edit'
 */
    const EditPorqueElegirnosForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditPorqueElegirnos.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\EditPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/EditPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/{record}/edit'
 */
        EditPorqueElegirnosForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditPorqueElegirnos.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\EditPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/EditPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/{record}/edit'
 */
        EditPorqueElegirnosForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditPorqueElegirnos.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditPorqueElegirnos.form = EditPorqueElegirnosForm
export default EditPorqueElegirnos