import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Diferencials\Pages\EditDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/EditDiferencial.php:7
 * @route '/admin/diferencials/{record}/edit'
 */
const EditDiferencial = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditDiferencial.url(args, options),
    method: 'get',
})

EditDiferencial.definition = {
    methods: ["get","head"],
    url: '/admin/diferencials/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Diferencials\Pages\EditDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/EditDiferencial.php:7
 * @route '/admin/diferencials/{record}/edit'
 */
EditDiferencial.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditDiferencial.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Diferencials\Pages\EditDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/EditDiferencial.php:7
 * @route '/admin/diferencials/{record}/edit'
 */
EditDiferencial.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditDiferencial.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Diferencials\Pages\EditDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/EditDiferencial.php:7
 * @route '/admin/diferencials/{record}/edit'
 */
EditDiferencial.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditDiferencial.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Diferencials\Pages\EditDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/EditDiferencial.php:7
 * @route '/admin/diferencials/{record}/edit'
 */
    const EditDiferencialForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditDiferencial.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Diferencials\Pages\EditDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/EditDiferencial.php:7
 * @route '/admin/diferencials/{record}/edit'
 */
        EditDiferencialForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditDiferencial.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Diferencials\Pages\EditDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/EditDiferencial.php:7
 * @route '/admin/diferencials/{record}/edit'
 */
        EditDiferencialForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditDiferencial.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditDiferencial.form = EditDiferencialForm
export default EditDiferencial