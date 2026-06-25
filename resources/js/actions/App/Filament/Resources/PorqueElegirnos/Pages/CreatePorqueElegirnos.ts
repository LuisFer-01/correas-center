import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\CreatePorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/CreatePorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/create'
 */
const CreatePorqueElegirnos = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreatePorqueElegirnos.url(options),
    method: 'get',
})

CreatePorqueElegirnos.definition = {
    methods: ["get","head"],
    url: '/admin/porque-elegirnos/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\CreatePorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/CreatePorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/create'
 */
CreatePorqueElegirnos.url = (options?: RouteQueryOptions) => {
    return CreatePorqueElegirnos.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\CreatePorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/CreatePorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/create'
 */
CreatePorqueElegirnos.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreatePorqueElegirnos.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\CreatePorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/CreatePorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/create'
 */
CreatePorqueElegirnos.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreatePorqueElegirnos.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\CreatePorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/CreatePorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/create'
 */
    const CreatePorqueElegirnosForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreatePorqueElegirnos.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\CreatePorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/CreatePorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/create'
 */
        CreatePorqueElegirnosForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreatePorqueElegirnos.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\CreatePorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/CreatePorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos/create'
 */
        CreatePorqueElegirnosForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreatePorqueElegirnos.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreatePorqueElegirnos.form = CreatePorqueElegirnosForm
export default CreatePorqueElegirnos