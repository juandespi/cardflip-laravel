var elixir = require('laravel-elixir');

// elixir(function(mix) {
//     mix.sass("app.scss");
// });

elixir((mix) => mix.browserSync({ proxy: 'http://localhost:8000/' })
                   .webpack('app.js')
                   .sass("app.scss")
);
