import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Heroes\Pages\CreateHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/CreateHero.php:7
 * @route '/admin/heroes/create'
 */
const CreateHero = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateHero.url(options),
    method: 'get',
})

CreateHero.definition = {
    methods: ["get","head"],
    url: '/admin/heroes/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Heroes\Pages\CreateHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/CreateHero.php:7
 * @route '/admin/heroes/create'
 */
CreateHero.url = (options?: RouteQueryOptions) => {
    return CreateHero.definition.url + queryParams(options)
}

/**
* @see \App\Filament\Resources\Heroes\Pages\CreateHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/CreateHero.php:7
 * @route '/admin/heroes/create'
 */
CreateHero.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: CreateHero.url(options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Heroes\Pages\CreateHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/CreateHero.php:7
 * @route '/admin/heroes/create'
 */
CreateHero.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: CreateHero.url(options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Heroes\Pages\CreateHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/CreateHero.php:7
 * @route '/admin/heroes/create'
 */
    const CreateHeroForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: CreateHero.url(options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Heroes\Pages\CreateHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/CreateHero.php:7
 * @route '/admin/heroes/create'
 */
        CreateHeroForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateHero.url(options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Heroes\Pages\CreateHero::__invoke
 * @see app/Filament/Resources/Heroes/Pages/CreateHero.php:7
 * @route '/admin/heroes/create'
 */
        CreateHeroForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: CreateHero.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    CreateHero.form = CreateHeroForm
export default CreateHero