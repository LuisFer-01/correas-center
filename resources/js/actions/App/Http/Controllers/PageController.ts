import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\PageController::about
 * @see app/Http/Controllers/PageController.php:19
 * @route '/about'
 */
export const about = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: about.url(options),
    method: 'get',
})

about.definition = {
    methods: ["get","head"],
    url: '/about',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\PageController::about
 * @see app/Http/Controllers/PageController.php:19
 * @route '/about'
 */
about.url = (options?: RouteQueryOptions) => {
    return about.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\PageController::about
 * @see app/Http/Controllers/PageController.php:19
 * @route '/about'
 */
about.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: about.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\PageController::about
 * @see app/Http/Controllers/PageController.php:19
 * @route '/about'
 */
about.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: about.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\PageController::about
 * @see app/Http/Controllers/PageController.php:19
 * @route '/about'
 */
    const aboutForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: about.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\PageController::about
 * @see app/Http/Controllers/PageController.php:19
 * @route '/about'
 */
        aboutForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: about.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\PageController::about
 * @see app/Http/Controllers/PageController.php:19
 * @route '/about'
 */
        aboutForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: about.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    about.form = aboutForm
/**
* @see \App\Http\Controllers\PageController::branches
 * @see app/Http/Controllers/PageController.php:69
 * @route '/branches'
 */
export const branches = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: branches.url(options),
    method: 'get',
})

branches.definition = {
    methods: ["get","head"],
    url: '/branches',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\PageController::branches
 * @see app/Http/Controllers/PageController.php:69
 * @route '/branches'
 */
branches.url = (options?: RouteQueryOptions) => {
    return branches.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\PageController::branches
 * @see app/Http/Controllers/PageController.php:69
 * @route '/branches'
 */
branches.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: branches.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\PageController::branches
 * @see app/Http/Controllers/PageController.php:69
 * @route '/branches'
 */
branches.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: branches.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\PageController::branches
 * @see app/Http/Controllers/PageController.php:69
 * @route '/branches'
 */
    const branchesForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: branches.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\PageController::branches
 * @see app/Http/Controllers/PageController.php:69
 * @route '/branches'
 */
        branchesForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: branches.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\PageController::branches
 * @see app/Http/Controllers/PageController.php:69
 * @route '/branches'
 */
        branchesForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: branches.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    branches.form = branchesForm
/**
* @see \App\Http\Controllers\PageController::privacy
 * @see app/Http/Controllers/PageController.php:99
 * @route '/privacy'
 */
export const privacy = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: privacy.url(options),
    method: 'get',
})

privacy.definition = {
    methods: ["get","head"],
    url: '/privacy',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\PageController::privacy
 * @see app/Http/Controllers/PageController.php:99
 * @route '/privacy'
 */
privacy.url = (options?: RouteQueryOptions) => {
    return privacy.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\PageController::privacy
 * @see app/Http/Controllers/PageController.php:99
 * @route '/privacy'
 */
privacy.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: privacy.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\PageController::privacy
 * @see app/Http/Controllers/PageController.php:99
 * @route '/privacy'
 */
privacy.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: privacy.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\PageController::privacy
 * @see app/Http/Controllers/PageController.php:99
 * @route '/privacy'
 */
    const privacyForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: privacy.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\PageController::privacy
 * @see app/Http/Controllers/PageController.php:99
 * @route '/privacy'
 */
        privacyForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: privacy.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\PageController::privacy
 * @see app/Http/Controllers/PageController.php:99
 * @route '/privacy'
 */
        privacyForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: privacy.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    privacy.form = privacyForm
/**
* @see \App\Http\Controllers\PageController::terms
 * @see app/Http/Controllers/PageController.php:108
 * @route '/terms'
 */
export const terms = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: terms.url(options),
    method: 'get',
})

terms.definition = {
    methods: ["get","head"],
    url: '/terms',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\PageController::terms
 * @see app/Http/Controllers/PageController.php:108
 * @route '/terms'
 */
terms.url = (options?: RouteQueryOptions) => {
    return terms.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\PageController::terms
 * @see app/Http/Controllers/PageController.php:108
 * @route '/terms'
 */
terms.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: terms.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\PageController::terms
 * @see app/Http/Controllers/PageController.php:108
 * @route '/terms'
 */
terms.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: terms.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\PageController::terms
 * @see app/Http/Controllers/PageController.php:108
 * @route '/terms'
 */
    const termsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: terms.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\PageController::terms
 * @see app/Http/Controllers/PageController.php:108
 * @route '/terms'
 */
        termsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: terms.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\PageController::terms
 * @see app/Http/Controllers/PageController.php:108
 * @route '/terms'
 */
        termsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: terms.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    terms.form = termsForm
const PageController = { about, branches, privacy, terms }

export default PageController