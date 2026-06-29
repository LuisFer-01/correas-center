import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
const EditProfile = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditProfile.url(args, options),
    method: 'get',
})

EditProfile.definition = {
    methods: ["get","head"],
    url: '/admin/mi-perfil/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
EditProfile.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditProfile.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
EditProfile.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditProfile.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
EditProfile.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditProfile.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
    const EditProfileForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditProfile.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
        EditProfileForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditProfile.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Profiles\Pages\EditProfile::__invoke
 * @see app/Filament/Resources/Profiles/Pages/EditProfile.php:7
 * @route '/admin/mi-perfil/{record}/edit'
 */
        EditProfileForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditProfile.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditProfile.form = EditProfileForm
export default EditProfile