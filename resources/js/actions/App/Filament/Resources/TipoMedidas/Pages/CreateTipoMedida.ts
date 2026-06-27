import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\TipoMedidas\Pages\CreateTipoMedida::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/CreateTipoMedida.php:7
 * @route '/admin/tipo-medidas/create'
 */
const CreateTipoMedida = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateTipoMedida.url(options),
    method: 'get',
})

CreateTipoMedida.definition = {
    methods: ["get","head"],
    url: '/admin/tipo-medidas/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\TipoMedidas\Pages\CreateTipoMedida::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/CreateTipoMedida.php:7
 * @route '/admin/tipo-medidas/create'
 */
CreateTipoMedida.url = (options?: RouteQueryOptions) => {
    return CreateTipoMedida.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\TipoMedidas\Pages\CreateTipoMedida::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/CreateTipoMedida.php:7
 * @route '/admin/tipo-medidas/create'
 */
CreateTipoMedida.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateTipoMedida.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\TipoMedidas\Pages\CreateTipoMedida::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/CreateTipoMedida.php:7
 * @route '/admin/tipo-medidas/create'
 */
CreateTipoMedida.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateTipoMedida.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\TipoMedidas\Pages\CreateTipoMedida::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/CreateTipoMedida.php:7
 * @route '/admin/tipo-medidas/create'
 */
    const CreateTipoMedidaForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateTipoMedida.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\TipoMedidas\Pages\CreateTipoMedida::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/CreateTipoMedida.php:7
 * @route '/admin/tipo-medidas/create'
 */
        CreateTipoMedidaForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateTipoMedida.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\TipoMedidas\Pages\CreateTipoMedida::__invoke
 * @see app/Filament/Resources/TipoMedidas/Pages/CreateTipoMedida.php:7
 * @route '/admin/tipo-medidas/create'
 */
        CreateTipoMedidaForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateTipoMedida.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateTipoMedida.form = CreateTipoMedidaForm
export default CreateTipoMedida