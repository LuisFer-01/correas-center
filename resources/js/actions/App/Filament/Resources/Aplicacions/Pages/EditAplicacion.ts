import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Aplicacions\Pages\EditAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/EditAplicacion.php:7
 * @route '/admin/aplicacions/{record}/edit'
 */
const EditAplicacion = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditAplicacion.url(args, options),
    method: 'get',
})

EditAplicacion.definition = {
    methods: ["get","head"],
    url: '/admin/aplicacions/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Aplicacions\Pages\EditAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/EditAplicacion.php:7
 * @route '/admin/aplicacions/{record}/edit'
 */
EditAplicacion.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditAplicacion.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Aplicacions\Pages\EditAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/EditAplicacion.php:7
 * @route '/admin/aplicacions/{record}/edit'
 */
EditAplicacion.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditAplicacion.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Aplicacions\Pages\EditAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/EditAplicacion.php:7
 * @route '/admin/aplicacions/{record}/edit'
 */
EditAplicacion.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditAplicacion.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Aplicacions\Pages\EditAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/EditAplicacion.php:7
 * @route '/admin/aplicacions/{record}/edit'
 */
    const EditAplicacionForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditAplicacion.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Aplicacions\Pages\EditAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/EditAplicacion.php:7
 * @route '/admin/aplicacions/{record}/edit'
 */
        EditAplicacionForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditAplicacion.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Aplicacions\Pages\EditAplicacion::__invoke
 * @see app/Filament/Resources/Aplicacions/Pages/EditAplicacion.php:7
 * @route '/admin/aplicacions/{record}/edit'
 */
        EditAplicacionForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditAplicacion.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditAplicacion.form = EditAplicacionForm
export default EditAplicacion