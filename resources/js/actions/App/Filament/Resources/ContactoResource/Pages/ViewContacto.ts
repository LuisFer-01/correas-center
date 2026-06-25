import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\ContactoResource\Pages\ViewContacto::__invoke
 * @see app/Filament/Resources/Contactos/Pages/ViewContacto.php:7
 * @route '/admin/contactos/{record}'
 */
const ViewContacto = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ViewContacto.url(args, options),
    method: 'get',
})

ViewContacto.definition = {
    methods: ["get","head"],
    url: '/admin/contactos/{record}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\ContactoResource\Pages\ViewContacto::__invoke
 * @see app/Filament/Resources/Contactos/Pages/ViewContacto.php:7
 * @route '/admin/contactos/{record}'
 */
ViewContacto.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return ViewContacto.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\ContactoResource\Pages\ViewContacto::__invoke
 * @see app/Filament/Resources/Contactos/Pages/ViewContacto.php:7
 * @route '/admin/contactos/{record}'
 */
ViewContacto.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: ViewContacto.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\ContactoResource\Pages\ViewContacto::__invoke
 * @see app/Filament/Resources/Contactos/Pages/ViewContacto.php:7
 * @route '/admin/contactos/{record}'
 */
ViewContacto.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: ViewContacto.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\ContactoResource\Pages\ViewContacto::__invoke
 * @see app/Filament/Resources/Contactos/Pages/ViewContacto.php:7
 * @route '/admin/contactos/{record}'
 */
    const ViewContactoForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: ViewContacto.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\ContactoResource\Pages\ViewContacto::__invoke
 * @see app/Filament/Resources/Contactos/Pages/ViewContacto.php:7
 * @route '/admin/contactos/{record}'
 */
        ViewContactoForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ViewContacto.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\ContactoResource\Pages\ViewContacto::__invoke
 * @see app/Filament/Resources/Contactos/Pages/ViewContacto.php:7
 * @route '/admin/contactos/{record}'
 */
        ViewContactoForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: ViewContacto.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    ViewContacto.form = ViewContactoForm
export default ViewContacto