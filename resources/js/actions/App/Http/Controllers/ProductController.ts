import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\ProductController::index
 * @see app/Http/Controllers/ProductController.php:16
 * @route '/products'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/products',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\ProductController::index
 * @see app/Http/Controllers/ProductController.php:16
 * @route '/products'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\ProductController::index
 * @see app/Http/Controllers/ProductController.php:16
 * @route '/products'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\ProductController::index
 * @see app/Http/Controllers/ProductController.php:16
 * @route '/products'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\ProductController::index
 * @see app/Http/Controllers/ProductController.php:16
 * @route '/products'
 */
    const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: index.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\ProductController::index
 * @see app/Http/Controllers/ProductController.php:16
 * @route '/products'
 */
        indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\ProductController::index
 * @see app/Http/Controllers/ProductController.php:16
 * @route '/products'
 */
        indexForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    index.form = indexForm
/**
* @see \App\Http\Controllers\ProductController::show
 * @see app/Http/Controllers/ProductController.php:63
 * @route '/products/{producto}'
 */
export const show = (args: { producto: string | number } | [producto: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

show.definition = {
    methods: ["get","head"],
    url: '/products/{producto}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\ProductController::show
 * @see app/Http/Controllers/ProductController.php:63
 * @route '/products/{producto}'
 */
show.url = (args: { producto: string | number } | [producto: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { producto: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    producto: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        producto: args.producto,
                }

    return show.definition.url
            .replace('{producto}', parsedArgs.producto.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\ProductController::show
 * @see app/Http/Controllers/ProductController.php:63
 * @route '/products/{producto}'
 */
show.get = (args: { producto: string | number } | [producto: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\ProductController::show
 * @see app/Http/Controllers/ProductController.php:63
 * @route '/products/{producto}'
 */
show.head = (args: { producto: string | number } | [producto: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: show.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\ProductController::show
 * @see app/Http/Controllers/ProductController.php:63
 * @route '/products/{producto}'
 */
    const showForm = (args: { producto: string | number } | [producto: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: show.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\ProductController::show
 * @see app/Http/Controllers/ProductController.php:63
 * @route '/products/{producto}'
 */
        showForm.get = (args: { producto: string | number } | [producto: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\ProductController::show
 * @see app/Http/Controllers/ProductController.php:63
 * @route '/products/{producto}'
 */
        showForm.head = (args: { producto: string | number } | [producto: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    show.form = showForm
/**
* @see \App\Http\Controllers\ProductController::categoryDetail
 * @see app/Http/Controllers/ProductController.php:103
 * @route '/products/{producto}/{categoria}'
 */
export const categoryDetail = (args: { producto: string | number, categoria: string | number } | [producto: string | number, categoria: string | number ], options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: categoryDetail.url(args, options),
    method: 'get',
})

categoryDetail.definition = {
    methods: ["get","head"],
    url: '/products/{producto}/{categoria}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\ProductController::categoryDetail
 * @see app/Http/Controllers/ProductController.php:103
 * @route '/products/{producto}/{categoria}'
 */
categoryDetail.url = (args: { producto: string | number, categoria: string | number } | [producto: string | number, categoria: string | number ], options?: RouteQueryOptions) => {
    if (Array.isArray(args)) {
        args = {
                    producto: args[0],
                    categoria: args[1],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        producto: args.producto,
                                categoria: args.categoria,
                }

    return categoryDetail.definition.url
            .replace('{producto}', parsedArgs.producto.toString())
            .replace('{categoria}', parsedArgs.categoria.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\ProductController::categoryDetail
 * @see app/Http/Controllers/ProductController.php:103
 * @route '/products/{producto}/{categoria}'
 */
categoryDetail.get = (args: { producto: string | number, categoria: string | number } | [producto: string | number, categoria: string | number ], options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: categoryDetail.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\ProductController::categoryDetail
 * @see app/Http/Controllers/ProductController.php:103
 * @route '/products/{producto}/{categoria}'
 */
categoryDetail.head = (args: { producto: string | number, categoria: string | number } | [producto: string | number, categoria: string | number ], options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: categoryDetail.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\ProductController::categoryDetail
 * @see app/Http/Controllers/ProductController.php:103
 * @route '/products/{producto}/{categoria}'
 */
    const categoryDetailForm = (args: { producto: string | number, categoria: string | number } | [producto: string | number, categoria: string | number ], options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: categoryDetail.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\ProductController::categoryDetail
 * @see app/Http/Controllers/ProductController.php:103
 * @route '/products/{producto}/{categoria}'
 */
        categoryDetailForm.get = (args: { producto: string | number, categoria: string | number } | [producto: string | number, categoria: string | number ], options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: categoryDetail.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\ProductController::categoryDetail
 * @see app/Http/Controllers/ProductController.php:103
 * @route '/products/{producto}/{categoria}'
 */
        categoryDetailForm.head = (args: { producto: string | number, categoria: string | number } | [producto: string | number, categoria: string | number ], options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: categoryDetail.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    categoryDetail.form = categoryDetailForm
const ProductController = { index, show, categoryDetail }

export default ProductController