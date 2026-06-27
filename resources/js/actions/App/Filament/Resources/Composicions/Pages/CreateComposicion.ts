import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Composicions\Pages\CreateComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/CreateComposicion.php:7
 * @route '/admin/composicions/create'
 */
const CreateComposicion = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateComposicion.url(options),
    method: 'get',
})

CreateComposicion.definition = {
    methods: ["get","head"],
    url: '/admin/composicions/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Composicions\Pages\CreateComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/CreateComposicion.php:7
 * @route '/admin/composicions/create'
 */
CreateComposicion.url = (options?: RouteQueryOptions) => {
    return CreateComposicion.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Composicions\Pages\CreateComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/CreateComposicion.php:7
 * @route '/admin/composicions/create'
 */
CreateComposicion.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateComposicion.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Composicions\Pages\CreateComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/CreateComposicion.php:7
 * @route '/admin/composicions/create'
 */
CreateComposicion.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateComposicion.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Composicions\Pages\CreateComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/CreateComposicion.php:7
 * @route '/admin/composicions/create'
 */
    const CreateComposicionForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateComposicion.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Composicions\Pages\CreateComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/CreateComposicion.php:7
 * @route '/admin/composicions/create'
 */
        CreateComposicionForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateComposicion.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Composicions\Pages\CreateComposicion::__invoke
 * @see app/Filament/Resources/Composicions/Pages/CreateComposicion.php:7
 * @route '/admin/composicions/create'
 */
        CreateComposicionForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateComposicion.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateComposicion.form = CreateComposicionForm
export default CreateComposicion