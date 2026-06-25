import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Diferencials\Pages\CreateDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/CreateDiferencial.php:7
 * @route '/admin/diferencials/create'
 */
const CreateDiferencial = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateDiferencial.url(options),
    method: 'get',
})

CreateDiferencial.definition = {
    methods: ["get","head"],
    url: '/admin/diferencials/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Diferencials\Pages\CreateDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/CreateDiferencial.php:7
 * @route '/admin/diferencials/create'
 */
CreateDiferencial.url = (options?: RouteQueryOptions) => {
    return CreateDiferencial.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Diferencials\Pages\CreateDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/CreateDiferencial.php:7
 * @route '/admin/diferencials/create'
 */
CreateDiferencial.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateDiferencial.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Diferencials\Pages\CreateDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/CreateDiferencial.php:7
 * @route '/admin/diferencials/create'
 */
CreateDiferencial.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateDiferencial.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Diferencials\Pages\CreateDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/CreateDiferencial.php:7
 * @route '/admin/diferencials/create'
 */
    const CreateDiferencialForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateDiferencial.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Diferencials\Pages\CreateDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/CreateDiferencial.php:7
 * @route '/admin/diferencials/create'
 */
        CreateDiferencialForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateDiferencial.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Diferencials\Pages\CreateDiferencial::__invoke
 * @see app/Filament/Resources/Diferencials/Pages/CreateDiferencial.php:7
 * @route '/admin/diferencials/create'
 */
        CreateDiferencialForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateDiferencial.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateDiferencial.form = CreateDiferencialForm
export default CreateDiferencial