import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Empresas\Pages\ListEmpresas::__invoke
 * @see app/Filament/Resources/Empresas/Pages/ListEmpresas.php:7
 * @route '/admin/empresas'
 */
const ListEmpresas = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListEmpresas.url(options),
    method: 'get',
})

ListEmpresas.definition = {
    methods: ["get","head"],
    url: '/admin/empresas',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Empresas\Pages\ListEmpresas::__invoke
 * @see app/Filament/Resources/Empresas/Pages/ListEmpresas.php:7
 * @route '/admin/empresas'
 */
ListEmpresas.url = (options?: RouteQueryOptions) => {
    return ListEmpresas.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Empresas\Pages\ListEmpresas::__invoke
 * @see app/Filament/Resources/Empresas/Pages/ListEmpresas.php:7
 * @route '/admin/empresas'
 */
ListEmpresas.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListEmpresas.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Empresas\Pages\ListEmpresas::__invoke
 * @see app/Filament/Resources/Empresas/Pages/ListEmpresas.php:7
 * @route '/admin/empresas'
 */
ListEmpresas.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListEmpresas.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Empresas\Pages\ListEmpresas::__invoke
 * @see app/Filament/Resources/Empresas/Pages/ListEmpresas.php:7
 * @route '/admin/empresas'
 */
    const ListEmpresasForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListEmpresas.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Empresas\Pages\ListEmpresas::__invoke
 * @see app/Filament/Resources/Empresas/Pages/ListEmpresas.php:7
 * @route '/admin/empresas'
 */
        ListEmpresasForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListEmpresas.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Empresas\Pages\ListEmpresas::__invoke
 * @see app/Filament/Resources/Empresas/Pages/ListEmpresas.php:7
 * @route '/admin/empresas'
 */
        ListEmpresasForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListEmpresas.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListEmpresas.form = ListEmpresasForm
export default ListEmpresas