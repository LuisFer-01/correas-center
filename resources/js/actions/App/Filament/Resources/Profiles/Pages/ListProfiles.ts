import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
const ListProfiles = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListProfiles.url(options),
    method: 'get',
})

ListProfiles.definition = {
    methods: ["get","head"],
    url: '/admin/mi-perfil',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
ListProfiles.url = (options?: RouteQueryOptions) => {
    return ListProfiles.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
ListProfiles.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListProfiles.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
ListProfiles.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListProfiles.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
    const ListProfilesForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListProfiles.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
        ListProfilesForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListProfiles.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
        ListProfilesForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListProfiles.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListProfiles.form = ListProfilesForm
export default ListProfiles