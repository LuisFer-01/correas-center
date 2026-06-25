import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Registros\Pages\CreateRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/CreateRegistro.php:7
 * @route '/admin/registros/create'
 */
const CreateRegistro = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateRegistro.url(options),
    method: 'get',
})

CreateRegistro.definition = {
    methods: ["get","head"],
    url: '/admin/registros/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Registros\Pages\CreateRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/CreateRegistro.php:7
 * @route '/admin/registros/create'
 */
CreateRegistro.url = (options?: RouteQueryOptions) => {
    return CreateRegistro.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Registros\Pages\CreateRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/CreateRegistro.php:7
 * @route '/admin/registros/create'
 */
CreateRegistro.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateRegistro.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Registros\Pages\CreateRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/CreateRegistro.php:7
 * @route '/admin/registros/create'
 */
CreateRegistro.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateRegistro.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Registros\Pages\CreateRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/CreateRegistro.php:7
 * @route '/admin/registros/create'
 */
    const CreateRegistroForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateRegistro.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Registros\Pages\CreateRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/CreateRegistro.php:7
 * @route '/admin/registros/create'
 */
        CreateRegistroForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateRegistro.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Registros\Pages\CreateRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/CreateRegistro.php:7
 * @route '/admin/registros/create'
 */
        CreateRegistroForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateRegistro.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateRegistro.form = CreateRegistroForm
export default CreateRegistro