import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Industrias\Pages\CreateIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/CreateIndustria.php:7
 * @route '/admin/industrias/create'
 */
const CreateIndustria = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateIndustria.url(options),
    method: 'get',
})

CreateIndustria.definition = {
    methods: ["get","head"],
    url: '/admin/industrias/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Industrias\Pages\CreateIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/CreateIndustria.php:7
 * @route '/admin/industrias/create'
 */
CreateIndustria.url = (options?: RouteQueryOptions) => {
    return CreateIndustria.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Industrias\Pages\CreateIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/CreateIndustria.php:7
 * @route '/admin/industrias/create'
 */
CreateIndustria.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateIndustria.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Industrias\Pages\CreateIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/CreateIndustria.php:7
 * @route '/admin/industrias/create'
 */
CreateIndustria.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateIndustria.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Industrias\Pages\CreateIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/CreateIndustria.php:7
 * @route '/admin/industrias/create'
 */
    const CreateIndustriaForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateIndustria.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Industrias\Pages\CreateIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/CreateIndustria.php:7
 * @route '/admin/industrias/create'
 */
        CreateIndustriaForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateIndustria.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Industrias\Pages\CreateIndustria::__invoke
 * @see app/Filament/Resources/Industrias/Pages/CreateIndustria.php:7
 * @route '/admin/industrias/create'
 */
        CreateIndustriaForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateIndustria.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateIndustria.form = CreateIndustriaForm
export default CreateIndustria