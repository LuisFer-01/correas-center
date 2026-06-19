import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\BrandController::index
 * @see app/Http/Controllers/BrandController.php:13
 * @route '/api/brands'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/api/brands',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\BrandController::index
 * @see app/Http/Controllers/BrandController.php:13
 * @route '/api/brands'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\BrandController::index
 * @see app/Http/Controllers/BrandController.php:13
 * @route '/api/brands'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\BrandController::index
 * @see app/Http/Controllers/BrandController.php:13
 * @route '/api/brands'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\BrandController::index
 * @see app/Http/Controllers/BrandController.php:13
 * @route '/api/brands'
 */
    const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: index.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\BrandController::index
 * @see app/Http/Controllers/BrandController.php:13
 * @route '/api/brands'
 */
        indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\BrandController::index
 * @see app/Http/Controllers/BrandController.php:13
 * @route '/api/brands'
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
const BrandController = { index }

export default BrandController