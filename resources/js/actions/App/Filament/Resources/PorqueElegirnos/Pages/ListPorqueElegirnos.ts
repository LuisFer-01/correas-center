import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\ListPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/ListPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos'
 */
const ListPorqueElegirnos = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListPorqueElegirnos.url(options),
    method: 'get',
})

ListPorqueElegirnos.definition = {
    methods: ["get","head"],
    url: '/admin/porque-elegirnos',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\ListPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/ListPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos'
 */
ListPorqueElegirnos.url = (options?: RouteQueryOptions) => {
    return ListPorqueElegirnos.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\ListPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/ListPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos'
 */
ListPorqueElegirnos.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListPorqueElegirnos.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\ListPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/ListPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos'
 */
ListPorqueElegirnos.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListPorqueElegirnos.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\ListPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/ListPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos'
 */
    const ListPorqueElegirnosForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListPorqueElegirnos.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\ListPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/ListPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos'
 */
        ListPorqueElegirnosForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListPorqueElegirnos.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\PorqueElegirnos\Pages\ListPorqueElegirnos::__invoke
 * @see app/Filament/Resources/PorqueElegirnos/Pages/ListPorqueElegirnos.php:7
 * @route '/admin/porque-elegirnos'
 */
        ListPorqueElegirnosForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListPorqueElegirnos.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListPorqueElegirnos.form = ListPorqueElegirnosForm
export default ListPorqueElegirnos