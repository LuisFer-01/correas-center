import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../../wayfinder'
/**
* @see \App\Filament\Resources\Empresas\Pages\EditEmpresa::__invoke
 * @see app/Filament/Resources/Empresas/Pages/EditEmpresa.php:7
 * @route '/admin/empresas/{record}/edit'
 */
const EditEmpresa = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditEmpresa.url(args, options),
    method: 'get',
})

EditEmpresa.definition = {
    methods: ["get","head"],
    url: '/admin/empresas/{record}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Filament\Resources\Empresas\Pages\EditEmpresa::__invoke
 * @see app/Filament/Resources/Empresas/Pages/EditEmpresa.php:7
 * @route '/admin/empresas/{record}/edit'
 */
EditEmpresa.url = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return EditEmpresa.definition.url
            .replace('{record}', parsedArgs.record.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Filament\Resources\Empresas\Pages\EditEmpresa::__invoke
 * @see app/Filament/Resources/Empresas/Pages/EditEmpresa.php:7
 * @route '/admin/empresas/{record}/edit'
 */
EditEmpresa.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: EditEmpresa.url(args, options),
    method: 'get',
})
/**
* @see \App\Filament\Resources\Empresas\Pages\EditEmpresa::__invoke
 * @see app/Filament/Resources/Empresas/Pages/EditEmpresa.php:7
 * @route '/admin/empresas/{record}/edit'
 */
EditEmpresa.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: EditEmpresa.url(args, options),
    method: 'head',
})

    /**
* @see \App\Filament\Resources\Empresas\Pages\EditEmpresa::__invoke
 * @see app/Filament/Resources/Empresas/Pages/EditEmpresa.php:7
 * @route '/admin/empresas/{record}/edit'
 */
    const EditEmpresaForm = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: EditEmpresa.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Filament\Resources\Empresas\Pages\EditEmpresa::__invoke
 * @see app/Filament/Resources/Empresas/Pages/EditEmpresa.php:7
 * @route '/admin/empresas/{record}/edit'
 */
        EditEmpresaForm.get = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditEmpresa.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Filament\Resources\Empresas\Pages\EditEmpresa::__invoke
 * @see app/Filament/Resources/Empresas/Pages/EditEmpresa.php:7
 * @route '/admin/empresas/{record}/edit'
 */
        EditEmpresaForm.head = (args: { record: string | number } | [record: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: EditEmpresa.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    EditEmpresa.form = EditEmpresaForm
export default EditEmpresa