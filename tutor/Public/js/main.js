require.config({
    paths: {
        jquery: 'jquery2'
    }
});
require(['jquery'], function($) {
    alert($().jquery);
});