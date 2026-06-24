import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Menus\Pages\EditMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/EditMenu.php:7
 * @route '/admin/menus/{record}/edit'
 */
const EditMenu = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditMenu.url(args, options),
    method: 'get',
})

EditMenu.definition = {
    methods: ["get","head"],
    url: '/admin/menus/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Menus\Pages\EditMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/EditMenu.php:7
 * @route '/admin/menus/{record}/edit'
 */
EditMenu.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditMenu.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Menus\Pages\EditMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/EditMenu.php:7
 * @route '/admin/menus/{record}/edit'
 */
EditMenu.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditMenu.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Menus\Pages\EditMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/EditMenu.php:7
 * @route '/admin/menus/{record}/edit'
 */
EditMenu.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditMenu.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Menus\Pages\EditMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/EditMenu.php:7
 * @route '/admin/menus/{record}/edit'
 */
    const EditMenuForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditMenu.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Menus\Pages\EditMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/EditMenu.php:7
 * @route '/admin/menus/{record}/edit'
 */
        EditMenuForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditMenu.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Menus\Pages\EditMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/EditMenu.php:7
 * @route '/admin/menus/{record}/edit'
 */
        EditMenuForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditMenu.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditMenu.form = EditMenuForm
export default EditMenu