import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Registros\Pages\EditRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/EditRegistro.php:7
 * @route '/admin/registros/{record}/edit'
 */
const EditRegistro = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditRegistro.url(args, options),
    method: 'get',
})

EditRegistro.definition = {
    methods: ["get","head"],
    url: '/admin/registros/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Registros\Pages\EditRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/EditRegistro.php:7
 * @route '/admin/registros/{record}/edit'
 */
EditRegistro.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditRegistro.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Registros\Pages\EditRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/EditRegistro.php:7
 * @route '/admin/registros/{record}/edit'
 */
EditRegistro.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditRegistro.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Registros\Pages\EditRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/EditRegistro.php:7
 * @route '/admin/registros/{record}/edit'
 */
EditRegistro.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditRegistro.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Registros\Pages\EditRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/EditRegistro.php:7
 * @route '/admin/registros/{record}/edit'
 */
    const EditRegistroForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditRegistro.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Registros\Pages\EditRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/EditRegistro.php:7
 * @route '/admin/registros/{record}/edit'
 */
        EditRegistroForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditRegistro.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Registros\Pages\EditRegistro::__invoke
 * @see app/Filament/Resources/Registros/Pages/EditRegistro.php:7
 * @route '/admin/registros/{record}/edit'
 */
        EditRegistroForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditRegistro.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditRegistro.form = EditRegistroForm
export default EditRegistro