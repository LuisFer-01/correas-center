import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Footers\Pages\EditFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/EditFooter.php:7
 * @route '/admin/footers/{record}/edit'
 */
const EditFooter = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditFooter.url(args, options),
    method: 'get',
})

EditFooter.definition = {
    methods: ["get","head"],
    url: '/admin/footers/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Footers\Pages\EditFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/EditFooter.php:7
 * @route '/admin/footers/{record}/edit'
 */
EditFooter.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditFooter.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Footers\Pages\EditFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/EditFooter.php:7
 * @route '/admin/footers/{record}/edit'
 */
EditFooter.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditFooter.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Footers\Pages\EditFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/EditFooter.php:7
 * @route '/admin/footers/{record}/edit'
 */
EditFooter.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditFooter.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Footers\Pages\EditFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/EditFooter.php:7
 * @route '/admin/footers/{record}/edit'
 */
    const EditFooterForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditFooter.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Footers\Pages\EditFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/EditFooter.php:7
 * @route '/admin/footers/{record}/edit'
 */
        EditFooterForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditFooter.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Footers\Pages\EditFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/EditFooter.php:7
 * @route '/admin/footers/{record}/edit'
 */
        EditFooterForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditFooter.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditFooter.form = EditFooterForm
export default EditFooter