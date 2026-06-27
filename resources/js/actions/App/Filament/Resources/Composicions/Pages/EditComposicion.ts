import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Composicions\Pages\EditComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/EditComposicion.php:7
 * @route '/admin/composicions/{record}/edit'
 */
const EditComposicion = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditComposicion.url(args, options),
    method: 'get',
})

EditComposicion.definition = {
    methods: ["get","head"],
    url: '/admin/composicions/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Composicions\Pages\EditComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/EditComposicion.php:7
 * @route '/admin/composicions/{record}/edit'
 */
EditComposicion.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditComposicion.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Composicions\Pages\EditComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/EditComposicion.php:7
 * @route '/admin/composicions/{record}/edit'
 */
EditComposicion.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditComposicion.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Composicions\Pages\EditComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/EditComposicion.php:7
 * @route '/admin/composicions/{record}/edit'
 */
EditComposicion.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditComposicion.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Composicions\Pages\EditComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/EditComposicion.php:7
 * @route '/admin/composicions/{record}/edit'
 */
    const EditComposicionForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditComposicion.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Composicions\Pages\EditComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/EditComposicion.php:7
 * @route '/admin/composicions/{record}/edit'
 */
        EditComposicionForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditComposicion.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Composicions\Pages\EditComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/EditComposicion.php:7
 * @route '/admin/composicions/{record}/edit'
 */
        EditComposicionForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditComposicion.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditComposicion.form = EditComposicionForm
export default EditComposicion