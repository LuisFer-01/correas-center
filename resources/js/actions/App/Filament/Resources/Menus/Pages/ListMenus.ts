import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Menus\Pages\ListMenus::__invoke
 * @see app/Filament/Resources/Menus/Pages/ListMenus.php:7
 * @route '/admin/menus'
 */
const ListMenus = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListMenus.url(options),
    method: 'get',
})

ListMenus.definition = {
    methods: ["get","head"],
    url: '/admin/menus',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Menus\Pages\ListMenus::__invoke
 * @see app/Filament/Resources/Menus/Pages/ListMenus.php:7
 * @route '/admin/menus'
 */
ListMenus.url = (options?: RouteQueryOptions) => {
    return ListMenus.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Menus\Pages\ListMenus::__invoke
 * @see app/Filament/Resources/Menus/Pages/ListMenus.php:7
 * @route '/admin/menus'
 */
ListMenus.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListMenus.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Menus\Pages\ListMenus::__invoke
 * @see app/Filament/Resources/Menus/Pages/ListMenus.php:7
 * @route '/admin/menus'
 */
ListMenus.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListMenus.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Menus\Pages\ListMenus::__invoke
 * @see app/Filament/Resources/Menus/Pages/ListMenus.php:7
 * @route '/admin/menus'
 */
    const ListMenusForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListMenus.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Menus\Pages\ListMenus::__invoke
 * @see app/Filament/Resources/Menus/Pages/ListMenus.php:7
 * @route '/admin/menus'
 */
        ListMenusForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListMenus.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Menus\Pages\ListMenus::__invoke
 * @see app/Filament/Resources/Menus/Pages/ListMenus.php:7
 * @route '/admin/menus'
 */
        ListMenusForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListMenus.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListMenus.form = ListMenusForm
export default ListMenus