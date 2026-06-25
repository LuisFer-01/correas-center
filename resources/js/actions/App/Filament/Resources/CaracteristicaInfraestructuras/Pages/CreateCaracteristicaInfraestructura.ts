import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\CreateCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/CreateCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/create'
 */
const CreateCaracteristicaInfraestructura = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateCaracteristicaInfraestructura.url(options),
    method: 'get',
})

CreateCaracteristicaInfraestructura.definition = {
    methods: ["get","head"],
    url: '/admin/caracteristica-infraestructuras/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\CreateCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/CreateCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/create'
 */
CreateCaracteristicaInfraestructura.url = (options?: RouteQueryOptions) => {
    return CreateCaracteristicaInfraestructura.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\CreateCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/CreateCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/create'
 */
CreateCaracteristicaInfraestructura.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateCaracteristicaInfraestructura.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\CreateCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/CreateCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/create'
 */
CreateCaracteristicaInfraestructura.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateCaracteristicaInfraestructura.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\CreateCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/CreateCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/create'
 */
    const CreateCaracteristicaInfraestructuraForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateCaracteristicaInfraestructura.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\CreateCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/CreateCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/create'
 */
        CreateCaracteristicaInfraestructuraForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateCaracteristicaInfraestructura.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\CaracteristicaInfraestructuras\Pages\CreateCaracteristicaInfraestructura::__invoke
 * @see app/Filament/Resources/CaracteristicaInfraestructuras/Pages/CreateCaracteristicaInfraestructura.php:7
 * @route '/admin/caracteristica-infraestructuras/create'
 */
        CreateCaracteristicaInfraestructuraForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateCaracteristicaInfraestructura.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateCaracteristicaInfraestructura.form = CreateCaracteristicaInfraestructuraForm
export default CreateCaracteristicaInfraestructura