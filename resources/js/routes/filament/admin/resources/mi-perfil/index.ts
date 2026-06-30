import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/admin/mi-perfil',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
    const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: index.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
        indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Profiles\Pages\ListProfiles::__invoke
 * @see app/Filament/Resources/Profiles/Pages/ListProfiles.php:7
 * @route '/admin/mi-perfil'
 */
        indexForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    index.form = indexForm
/**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
export const edit = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})

edit.definition = {
    methods: ["get","head"],
    url: '/admin/mi-perfil/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
edit.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return edit.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
edit.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
edit.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: edit.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
    const editForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: edit.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
        editForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: edit.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
        editForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: edit.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    edit.form = editForm
const miPerfil = {
    index: Object.assign(index, index),
edit: Object.assign(edit, edit),
}

export default miPerfil