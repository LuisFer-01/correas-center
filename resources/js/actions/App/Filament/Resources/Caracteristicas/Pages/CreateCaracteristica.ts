import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Caracteristicas\Pages\CreateCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/CreateCaracteristica.php:7
 * @route '/admin/caracteristicas/create'
 */
const CreateCaracteristica = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateCaracteristica.url(options),
    method: 'get',
})

CreateCaracteristica.definition = {
    methods: ["get","head"],
    url: '/admin/caracteristicas/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Caracteristicas\Pages\CreateCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/CreateCaracteristica.php:7
 * @route '/admin/caracteristicas/create'
 */
CreateCaracteristica.url = (options?: RouteQueryOptions) => {
    return CreateCaracteristica.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Caracteristicas\Pages\CreateCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/CreateCaracteristica.php:7
 * @route '/admin/caracteristicas/create'
 */
CreateCaracteristica.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateCaracteristica.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Caracteristicas\Pages\CreateCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/CreateCaracteristica.php:7
 * @route '/admin/caracteristicas/create'
 */
CreateCaracteristica.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateCaracteristica.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Caracteristicas\Pages\CreateCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/CreateCaracteristica.php:7
 * @route '/admin/caracteristicas/create'
 */
    const CreateCaracteristicaForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateCaracteristica.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Caracteristicas\Pages\CreateCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/CreateCaracteristica.php:7
 * @route '/admin/caracteristicas/create'
 */
        CreateCaracteristicaForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateCaracteristica.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Caracteristicas\Pages\CreateCaracteristica::__invoke
 * @see app/Filament/Resources/Caracteristicas/Pages/CreateCaracteristica.php:7
 * @route '/admin/caracteristicas/create'
 */
        CreateCaracteristicaForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateCaracteristica.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateCaracteristica.form = CreateCaracteristicaForm
export default CreateCaracteristica