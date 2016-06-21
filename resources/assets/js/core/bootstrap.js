/*
 * Load Vue & Vue-Resource.
 *
 * Vue is the JavaScript framework used by Spark.
 */
if (window.Vue === undefined) {
    window.Vue = require('vue');
}

require('vue-resource');

// Set X-CSRF-TOKEN
Vue.http.headers.common['X-CSRF-TOKEN'] = Intactfx.csrfToken;

/*
 * Load jQuery and Bootstrap jQuery, used for front-end interaction.
 */
if (window.$ === undefined || window.jQuery === undefined) {
    window.$ = window.jQuery = require('jquery');
}
/**
 * Twiiter bootstrap
 */
require('bootstrap');

if (window.moment === undefined) {
    window.moment = require('moment');
}







