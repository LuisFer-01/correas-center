import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Medidas\Pages\EditMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/EditMedida.php:7
 * @route '/admin/medidas/{record}/edit'
 */
const EditMedida = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditMedida.url(args, options),
    method: 'get',
})

EditMedida.definition = {
    methods: ["get","head"],
    url: '/admin/medidas/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Medidas\Pages\EditMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/EditMedida.php:7
 * @route '/admin/medidas/{record}/edit'
 */
EditMedida.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditMedida.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Medidas\Pages\EditMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/EditMedida.php:7
 * @route '/admin/medidas/{record}/edit'
 */
EditMedida.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditMedida.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Medidas\Pages\EditMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/EditMedida.php:7
 * @route '/admin/medidas/{record}/edit'
 */
EditMedida.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditMedida.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Medidas\Pages\EditMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/EditMedida.php:7
 * @route '/admin/medidas/{record}/edit'
 */
    const EditMedidaForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditMedida.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Medidas\Pages\EditMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/EditMedida.php:7
 * @route '/admin/medidas/{record}/edit'
 */
        EditMedidaForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditMedida.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Medidas\Pages\EditMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/EditMedida.php:7
 * @route '/admin/medidas/{record}/edit'
 */
        EditMedidaForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditMedida.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditMedida.form = EditMedidaForm
export default EditMedida