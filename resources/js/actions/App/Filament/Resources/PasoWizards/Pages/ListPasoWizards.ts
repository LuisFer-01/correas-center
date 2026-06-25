import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\PasoWizards\Pages\ListPasoWizards::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/ListPasoWizards.php:7
 * @route '/admin/paso-wizards'
 */
const ListPasoWizards = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListPasoWizards.url(options),
    method: 'get',
})

ListPasoWizards.definition = {
    methods: ["get","head"],
    url: '/admin/paso-wizards',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\PasoWizards\Pages\ListPasoWizards::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/ListPasoWizards.php:7
 * @route '/admin/paso-wizards'
 */
ListPasoWizards.url = (options?: RouteQueryOptions) => {
    return ListPasoWizards.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\PasoWizards\Pages\ListPasoWizards::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/ListPasoWizards.php:7
 * @route '/admin/paso-wizards'
 */
ListPasoWizards.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListPasoWizards.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\PasoWizards\Pages\ListPasoWizards::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/ListPasoWizards.php:7
 * @route '/admin/paso-wizards'
 */
ListPasoWizards.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListPasoWizards.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\PasoWizards\Pages\ListPasoWizards::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/ListPasoWizards.php:7
 * @route '/admin/paso-wizards'
 */
    const ListPasoWizardsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListPasoWizards.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\PasoWizards\Pages\ListPasoWizards::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/ListPasoWizards.php:7
 * @route '/admin/paso-wizards'
 */
        ListPasoWizardsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListPasoWizards.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\PasoWizards\Pages\ListPasoWizards::__invoke
 * @see app/Filament/Resources/PasoWizards/Pages/ListPasoWizards.php:7
 * @route '/admin/paso-wizards'
 */
        ListPasoWizardsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListPasoWizards.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListPasoWizards.form = ListPasoWizardsForm
export default ListPasoWizards