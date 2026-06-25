import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Sucursals\Pages\CreateSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/CreateSucursal.php:7
 * @route '/admin/sucursals/create'
 */
const CreateSucursal = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateSucursal.url(options),
    method: 'get',
})

CreateSucursal.definition = {
    methods: ["get","head"],
    url: '/admin/sucursals/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Sucursals\Pages\CreateSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/CreateSucursal.php:7
 * @route '/admin/sucursals/create'
 */
CreateSucursal.url = (options?: RouteQueryOptions) => {
    return CreateSucursal.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Sucursals\Pages\CreateSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/CreateSucursal.php:7
 * @route '/admin/sucursals/create'
 */
CreateSucursal.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateSucursal.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Sucursals\Pages\CreateSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/CreateSucursal.php:7
 * @route '/admin/sucursals/create'
 */
CreateSucursal.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateSucursal.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Sucursals\Pages\CreateSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/CreateSucursal.php:7
 * @route '/admin/sucursals/create'
 */
    const CreateSucursalForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateSucursal.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Sucursals\Pages\CreateSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/CreateSucursal.php:7
 * @route '/admin/sucursals/create'
 */
        CreateSucursalForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateSucursal.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Sucursals\Pages\CreateSucursal::__invoke
 * @see app/Filament/Resources/Sucursals/Pages/CreateSucursal.php:7
 * @route '/admin/sucursals/create'
 */
        CreateSucursalForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateSucursal.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateSucursal.form = CreateSucursalForm
export default CreateSucursal