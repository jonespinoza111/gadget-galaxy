const mix = require('laravel-mix');

if (process.env.NODE_ENV === 'development') {
    mix.webpackConfig({
        plugins: [
            new webpack.EnvironmentPlugin({
                APP_URL: JSON.stringify('http://localhost:8000'),
                // Add other DEV variables here
                
            })
        ]
    });
} else {
    mix.webpackConfig({
        plugins: [
            new webpack.EnvironmentPlugin({
                API_URL: JSON.stringify('https://gadget-galaxy.site'),
                // Add other live domain variables here
            })
        ]
    });
}
