requirejs.config({
    baseUrl: 'assets/templates/',
    paths: {
        jquery: 'components/jquery/dist/jquery.min',
        async: 'components/requirejs-plugins/src/async',
        main: 'js/main'
    }
});

require(['main']);