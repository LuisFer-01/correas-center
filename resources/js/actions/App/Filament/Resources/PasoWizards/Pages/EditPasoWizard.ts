import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\PasoWizards\Pages\EditPasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/EditPasoWizard.php:7
 * @route '/admin/paso-wizards/{record}/edit'
 */
const EditPasoWizard = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditPasoWizard.url(args, options),
    method: 'get',
})

EditPasoWizard.definition = {
    methods: ["get","head"],
    url: '/admin/paso-wizards/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\PasoWizards\Pages\EditPasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/EditPasoWizard.php:7
 * @route '/admin/paso-wizards/{record}/edit'
 */
EditPasoWizard.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditPasoWizard.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\PasoWizards\Pages\EditPasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/EditPasoWizard.php:7
 * @route '/admin/paso-wizards/{record}/edit'
 */
EditPasoWizard.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditPasoWizard.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\PasoWizards\Pages\EditPasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/EditPasoWizard.php:7
 * @route '/admin/paso-wizards/{record}/edit'
 */
EditPasoWizard.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditPasoWizard.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\PasoWizards\Pages\EditPasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/EditPasoWizard.php:7
 * @route '/admin/paso-wizards/{record}/edit'
 */
    const EditPasoWizardForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditPasoWizard.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\PasoWizards\Pages\EditPasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/EditPasoWizard.php:7
 * @route '/admin/paso-wizards/{record}/edit'
 */
        EditPasoWizardForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditPasoWizard.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\PasoWizards\Pages\EditPasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/EditPasoWizard.php:7
 * @route '/admin/paso-wizards/{record}/edit'
 */
        EditPasoWizardForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditPasoWizard.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditPasoWizard.form = EditPasoWizardForm
export default EditPasoWizard