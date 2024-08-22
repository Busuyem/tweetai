const mix = require('laravel-mix');
const { VueLoaderPlugin } = require('vue-loader'); // Correct import for Vue 3

mix.js('resources/js/app.js', 'public/js')
   .vue() // Enables Vue support
   .sass('resources/sass/app.scss', 'public/css');

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
            },
        ],
    },
    plugins: [
        new VueLoaderPlugin(), // Correct usage of the VueLoaderPlugin
    ],
});
