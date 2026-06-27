import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Aplicacions\Pages\CreateAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/CreateAplicacion.php:7
 * @route '/admin/aplicacions/create'
 */
const CreateAplicacion = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateAplicacion.url(options),
    method: 'get',
})

CreateAplicacion.definition = {
    methods: ["get","head"],
    url: '/admin/aplicacions/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Aplicacions\Pages\CreateAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/CreateAplicacion.php:7
 * @route '/admin/aplicacions/create'
 */
CreateAplicacion.url = (options?: RouteQueryOptions) => {
    return CreateAplicacion.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Aplicacions\Pages\CreateAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/CreateAplicacion.php:7
 * @route '/admin/aplicacions/create'
 */
CreateAplicacion.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateAplicacion.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Aplicacions\Pages\CreateAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/CreateAplicacion.php:7
 * @route '/admin/aplicacions/create'
 */
CreateAplicacion.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateAplicacion.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Aplicacions\Pages\CreateAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/CreateAplicacion.php:7
 * @route '/admin/aplicacions/create'
 */
    const CreateAplicacionForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateAplicacion.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Aplicacions\Pages\CreateAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/CreateAplicacion.php:7
 * @route '/admin/aplicacions/create'
 */
        CreateAplicacionForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateAplicacion.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Aplicacions\Pages\CreateAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/CreateAplicacion.php:7
 * @route '/admin/aplicacions/create'
 */
        CreateAplicacionForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateAplicacion.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateAplicacion.form = CreateAplicacionForm
export default CreateAplicacion