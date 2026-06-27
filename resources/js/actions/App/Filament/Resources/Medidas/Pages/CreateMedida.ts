import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Medidas\Pages\CreateMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/CreateMedida.php:7
 * @route '/admin/medidas/create'
 */
const CreateMedida = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateMedida.url(options),
    method: 'get',
})

CreateMedida.definition = {
    methods: ["get","head"],
    url: '/admin/medidas/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Medidas\Pages\CreateMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/CreateMedida.php:7
 * @route '/admin/medidas/create'
 */
CreateMedida.url = (options?: RouteQueryOptions) => {
    return CreateMedida.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Medidas\Pages\CreateMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/CreateMedida.php:7
 * @route '/admin/medidas/create'
 */
CreateMedida.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateMedida.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Medidas\Pages\CreateMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/CreateMedida.php:7
 * @route '/admin/medidas/create'
 */
CreateMedida.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateMedida.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Medidas\Pages\CreateMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/CreateMedida.php:7
 * @route '/admin/medidas/create'
 */
    const CreateMedidaForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateMedida.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Medidas\Pages\CreateMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/CreateMedida.php:7
 * @route '/admin/medidas/create'
 */
        CreateMedidaForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateMedida.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Medidas\Pages\CreateMedida::__invoke
 * @see app/Filament/Resources/Medidas/Pages/CreateMedida.php:7
 * @route '/admin/medidas/create'
 */
        CreateMedidaForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateMedida.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateMedida.form = CreateMedidaForm
export default CreateMedida