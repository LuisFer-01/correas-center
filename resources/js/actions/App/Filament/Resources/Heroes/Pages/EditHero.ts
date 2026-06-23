import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Heroes\Pages\EditHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/EditHero.php:7
 * @route '/admin/heroes/{record}/edit'
 */
const EditHero = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditHero.url(args, options),
    method: 'get',
})

EditHero.definition = {
    methods: ["get","head"],
    url: '/admin/heroes/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Heroes\Pages\EditHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/EditHero.php:7
 * @route '/admin/heroes/{record}/edit'
 */
EditHero.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditHero.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Heroes\Pages\EditHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/EditHero.php:7
 * @route '/admin/heroes/{record}/edit'
 */
EditHero.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditHero.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Heroes\Pages\EditHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/EditHero.php:7
 * @route '/admin/heroes/{record}/edit'
 */
EditHero.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditHero.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Heroes\Pages\EditHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/EditHero.php:7
 * @route '/admin/heroes/{record}/edit'
 */
    const EditHeroForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditHero.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Heroes\Pages\EditHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/EditHero.php:7
 * @route '/admin/heroes/{record}/edit'
 */
        EditHeroForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditHero.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Heroes\Pages\EditHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/EditHero.php:7
 * @route '/admin/heroes/{record}/edit'
 */
        EditHeroForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditHero.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditHero.form = EditHeroForm
export default EditHero