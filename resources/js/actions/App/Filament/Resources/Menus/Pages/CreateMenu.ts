import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Menus\Pages\CreateMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/CreateMenu.php:7
 * @route '/admin/menus/create'
 */
const CreateMenu = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateMenu.url(options),
    method: 'get',
})

CreateMenu.definition = {
    methods: ["get","head"],
    url: '/admin/menus/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Menus\Pages\CreateMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/CreateMenu.php:7
 * @route '/admin/menus/create'
 */
CreateMenu.url = (options?: RouteQueryOptions) => {
    return CreateMenu.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Menus\Pages\CreateMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/CreateMenu.php:7
 * @route '/admin/menus/create'
 */
CreateMenu.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateMenu.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Menus\Pages\CreateMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/CreateMenu.php:7
 * @route '/admin/menus/create'
 */
CreateMenu.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateMenu.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Menus\Pages\CreateMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/CreateMenu.php:7
 * @route '/admin/menus/create'
 */
    const CreateMenuForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateMenu.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Menus\Pages\CreateMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/CreateMenu.php:7
 * @route '/admin/menus/create'
 */
        CreateMenuForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateMenu.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Menus\Pages\CreateMenu::__invoke
 * @see app/Filament/Resources/Menus/Pages/CreateMenu.php:7
 * @route '/admin/menus/create'
 */
        CreateMenuForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateMenu.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateMenu.form = CreateMenuForm
export default CreateMenu