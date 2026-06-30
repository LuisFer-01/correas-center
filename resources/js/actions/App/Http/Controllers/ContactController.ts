import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\ContactController::index
 * @see app/Http/Controllers/ContactController.php:22
 * @route '/contact'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/contact',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\ContactController::index
 * @see app/Http/Controllers/ContactController.php:22
 * @route '/contact'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\ContactController::index
 * @see app/Http/Controllers/ContactController.php:22
 * @route '/contact'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\ContactController::index
 * @see app/Http/Controllers/ContactController.php:22
 * @route '/contact'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\ContactController::index
 * @see app/Http/Controllers/ContactController.php:22
 * @route '/contact'
 */
    const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: index.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\ContactController::index
 * @see app/Http/Controllers/ContactController.php:22
 * @route '/contact'
 */
        indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\ContactController::index
 * @see app/Http/Controllers/ContactController.php:22
 * @route '/contact'
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
* @see \App\Http\Controllers\ContactController::store
 * @see app/Http/Controllers/ContactController.php:31
 * @route '/contact'
 */
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/contact',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\ContactController::store
 * @see app/Http/Controllers/ContactController.php:31
 * @route '/contact'
 */
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\ContactController::store
 * @see app/Http/Controllers/ContactController.php:31
 * @route '/contact'
 */
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\ContactController::store
 * @see app/Http/Controllers/ContactController.php:31
 * @route '/contact'
 */
    const storeForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: store.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\ContactController::store
 * @see app/Http/Controllers/ContactController.php:31
 * @route '/contact'
 */
        storeForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: store.url(options),
            method: 'post',
        })
    
    store.form = storeForm
/**
* @see \App\Http\Controllers\ContactController::subscribeNewsletter
 * @see app/Http/Controllers/ContactController.php:71
 * @route '/newsletter/subscribe'
 */
export const subscribeNewsletter = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: subscribeNewsletter.url(options),
    method: 'post',
})

subscribeNewsletter.definition = {
    methods: ["post"],
    url: '/newsletter/subscribe',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\ContactController::subscribeNewsletter
 * @see app/Http/Controllers/ContactController.php:71
 * @route '/newsletter/subscribe'
 */
subscribeNewsletter.url = (options?: RouteQueryOptions) => {
    return subscribeNewsletter.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\ContactController::subscribeNewsletter
 * @see app/Http/Controllers/ContactController.php:71
 * @route '/newsletter/subscribe'
 */
subscribeNewsletter.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: subscribeNewsletter.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\ContactController::subscribeNewsletter
 * @see app/Http/Controllers/ContactController.php:71
 * @route '/newsletter/subscribe'
 */
    const subscribeNewsletterForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: subscribeNewsletter.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\ContactController::subscribeNewsletter
 * @see app/Http/Controllers/ContactController.php:71
 * @route '/newsletter/subscribe'
 */
        subscribeNewsletterForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: subscribeNewsletter.url(options),
            method: 'post',
        })
    
    subscribeNewsletter.form = subscribeNewsletterForm
const ContactController = { index, store, subscribeNewsletter }

export default ContactController