import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\PasoWizards\Pages\CreatePasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/CreatePasoWizard.php:7
 * @route '/admin/paso-wizards/create'
 */
const CreatePasoWizard = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreatePasoWizard.url(options),
    method: 'get',
})

CreatePasoWizard.definition = {
    methods: ["get","head"],
    url: '/admin/paso-wizards/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\PasoWizards\Pages\CreatePasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/CreatePasoWizard.php:7
 * @route '/admin/paso-wizards/create'
 */
CreatePasoWizard.url = (options?: RouteQueryOptions) => {
    return CreatePasoWizard.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\PasoWizards\Pages\CreatePasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/CreatePasoWizard.php:7
 * @route '/admin/paso-wizards/create'
 */
CreatePasoWizard.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreatePasoWizard.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\PasoWizards\Pages\CreatePasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/CreatePasoWizard.php:7
 * @route '/admin/paso-wizards/create'
 */
CreatePasoWizard.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreatePasoWizard.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\PasoWizards\Pages\CreatePasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/CreatePasoWizard.php:7
 * @route '/admin/paso-wizards/create'
 */
    const CreatePasoWizardForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreatePasoWizard.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\PasoWizards\Pages\CreatePasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/CreatePasoWizard.php:7
 * @route '/admin/paso-wizards/create'
 */
        CreatePasoWizardForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreatePasoWizard.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\PasoWizards\Pages\CreatePasoWizard::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/CreatePasoWizard.php:7
 * @route '/admin/paso-wizards/create'
 */
        CreatePasoWizardForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreatePasoWizard.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreatePasoWizard.form = CreatePasoWizardForm
export default CreatePasoWizard