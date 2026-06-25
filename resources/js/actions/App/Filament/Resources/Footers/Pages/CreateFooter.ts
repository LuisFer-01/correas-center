import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Footers\Pages\CreateFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/CreateFooter.php:7
 * @route '/admin/footers/create'
 */
const CreateFooter = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateFooter.url(options),
    method: 'get',
})

CreateFooter.definition = {
    methods: ["get","head"],
    url: '/admin/footers/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Footers\Pages\CreateFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/CreateFooter.php:7
 * @route '/admin/footers/create'
 */
CreateFooter.url = (options?: RouteQueryOptions) => {
    return CreateFooter.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Footers\Pages\CreateFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/CreateFooter.php:7
 * @route '/admin/footers/create'
 */
CreateFooter.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateFooter.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Footers\Pages\CreateFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/CreateFooter.php:7
 * @route '/admin/footers/create'
 */
CreateFooter.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateFooter.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Footers\Pages\CreateFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/CreateFooter.php:7
 * @route '/admin/footers/create'
 */
    const CreateFooterForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateFooter.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Footers\Pages\CreateFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/CreateFooter.php:7
 * @route '/admin/footers/create'
 */
        CreateFooterForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateFooter.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Footers\Pages\CreateFooter::__invoke
 * @see app/Filament/Resources/Footers/Pages/CreateFooter.php:7
 * @route '/admin/footers/create'
 */
        CreateFooterForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateFooter.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateFooter.form = CreateFooterForm
export default CreateFooter