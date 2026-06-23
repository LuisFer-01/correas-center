import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Heroes\Pages\ListHeroes::__invoke
 * @see app/Filament/Resources/Heroes/Pages/ListHeroes.php:7
 * @route '/admin/heroes'
 */
const ListHeroes = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListHeroes.url(options),
    method: 'get',
})

ListHeroes.definition = {
    methods: ["get","head"],
    url: '/admin/heroes',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Heroes\Pages\ListHeroes::__invoke
 * @see app/Filament/Resources/Heroes/Pages/ListHeroes.php:7
 * @route '/admin/heroes'
 */
ListHeroes.url = (options?: RouteQueryOptions) => {
    return ListHeroes.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Heroes\Pages\ListHeroes::__invoke
 * @see app/Filament/Resources/Heroes/Pages/ListHeroes.php:7
 * @route '/admin/heroes'
 */
ListHeroes.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ListHeroes.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Heroes\Pages\ListHeroes::__invoke
 * @see app/Filament/Resources/Heroes/Pages/ListHeroes.php:7
 * @route '/admin/heroes'
 */
ListHeroes.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ListHeroes.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Heroes\Pages\ListHeroes::__invoke
 * @see app/Filament/Resources/Heroes/Pages/ListHeroes.php:7
 * @route '/admin/heroes'
 */
    const ListHeroesForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ListHeroes.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Heroes\Pages\ListHeroes::__invoke
 * @see app/Filament/Resources/Heroes/Pages/ListHeroes.php:7
 * @route '/admin/heroes'
 */
        ListHeroesForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListHeroes.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Heroes\Pages\ListHeroes::__invoke
 * @see app/Filament/Resources/Heroes/Pages/ListHeroes.php:7
 * @route '/admin/heroes'
 */
        ListHeroesForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ListHeroes.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ListHeroes.form = ListHeroesForm
export default ListHeroes