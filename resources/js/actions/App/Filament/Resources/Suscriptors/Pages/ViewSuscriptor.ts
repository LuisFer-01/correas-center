import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Suscriptors\Pages\ViewSuscriptor::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ViewSuscriptor.php:7
 * @route '/admin/suscriptors/{record}'
 */
const ViewSuscriptor = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ViewSuscriptor.url(args, options),
    method: 'get',
})

ViewSuscriptor.definition = {
    methods: ["get","head"],
    url: '/admin/suscriptors/{record}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Suscriptors\Pages\ViewSuscriptor::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ViewSuscriptor.php:7
 * @route '/admin/suscriptors/{record}'
 */
ViewSuscriptor.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { record: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    record: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        record: args.record,
                }

    return ViewSuscriptor.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Suscriptors\Pages\ViewSuscriptor::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ViewSuscriptor.php:7
 * @route '/admin/suscriptors/{record}'
 */
ViewSuscriptor.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ViewSuscriptor.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Suscriptors\Pages\ViewSuscriptor::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ViewSuscriptor.php:7
 * @route '/admin/suscriptors/{record}'
 */
ViewSuscriptor.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ViewSuscriptor.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Suscriptors\Pages\ViewSuscriptor::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ViewSuscriptor.php:7
 * @route '/admin/suscriptors/{record}'
 */
    const ViewSuscriptorForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ViewSuscriptor.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Suscriptors\Pages\ViewSuscriptor::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ViewSuscriptor.php:7
 * @route '/admin/suscriptors/{record}'
 */
        ViewSuscriptorForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ViewSuscriptor.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Suscriptors\Pages\ViewSuscriptor::__invoke
 * @see app/Filament/Resources/Suscriptors/Pages/ViewSuscriptor.php:7
 * @route '/admin/suscriptors/{record}'
 */
        ViewSuscriptorForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ViewSuscriptor.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ViewSuscriptor.form = ViewSuscriptorForm
export default ViewSuscriptor