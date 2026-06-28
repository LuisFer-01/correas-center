import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Industrias\Pages\EditIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/EditIndustria.php:7
 * @route '/admin/industrias/{record}/edit'
 */
const EditIndustria = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditIndustria.url(args, options),
    method: 'get',
})

EditIndustria.definition = {
    methods: ["get","head"],
    url: '/admin/industrias/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Industrias\Pages\EditIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/EditIndustria.php:7
 * @route '/admin/industrias/{record}/edit'
 */
EditIndustria.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditIndustria.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Industrias\Pages\EditIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/EditIndustria.php:7
 * @route '/admin/industrias/{record}/edit'
 */
EditIndustria.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditIndustria.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Industrias\Pages\EditIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/EditIndustria.php:7
 * @route '/admin/industrias/{record}/edit'
 */
EditIndustria.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditIndustria.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Industrias\Pages\EditIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/EditIndustria.php:7
 * @route '/admin/industrias/{record}/edit'
 */
    const EditIndustriaForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditIndustria.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Industrias\Pages\EditIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/EditIndustria.php:7
 * @route '/admin/industrias/{record}/edit'
 */
        EditIndustriaForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditIndustria.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Industrias\Pages\EditIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/EditIndustria.php:7
 * @route '/admin/industrias/{record}/edit'
 */
        EditIndustriaForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditIndustria.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditIndustria.form = EditIndustriaForm
export default EditIndustria