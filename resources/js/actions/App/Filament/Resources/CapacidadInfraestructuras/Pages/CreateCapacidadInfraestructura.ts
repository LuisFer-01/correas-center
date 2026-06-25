import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\CreateCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/CreateCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/create'
 */
const CreateCapacidadInfraestructura = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateCapacidadInfraestructura.url(options),
    method: 'get',
})

CreateCapacidadInfraestructura.definition = {
    methods: ["get","head"],
    url: '/admin/capacidad-infraestructuras/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\CreateCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/CreateCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/create'
 */
CreateCapacidadInfraestructura.url = (options?: RouteQueryOptions) => {
    return CreateCapacidadInfraestructura.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\CreateCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/CreateCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/create'
 */
CreateCapacidadInfraestructura.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateCapacidadInfraestructura.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\CreateCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/CreateCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/create'
 */
CreateCapacidadInfraestructura.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateCapacidadInfraestructura.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\CreateCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/CreateCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/create'
 */
    const CreateCapacidadInfraestructuraForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateCapacidadInfraestructura.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\CreateCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/CreateCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/create'
 */
        CreateCapacidadInfraestructuraForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateCapacidadInfraestructura.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\CapacidadInfraestructuras\Pages\CreateCapacidadInfraestructura::__invoke
 * @see app/Filament/Resources/CapacidadInfraestructuras/Pages/CreateCapacidadInfraestructura.php:7
 * @route '/admin/capacidad-infraestructuras/create'
 */
        CreateCapacidadInfraestructuraForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateCapacidadInfraestructura.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateCapacidadInfraestructura.form = CreateCapacidadInfraestructuraForm
export default CreateCapacidadInfraestructura