# How To Build This Backend With Filament

Go To: [Building Theme Filament](https://filamentphp.com/docs/2.x/admin/appearance#building-themes)

-   Run this just to make sure all installed

```
npm install tailwindcss @tailwindcss/forms @tailwindcss/typography autoprefixer tippy.js --save-dev
```

-   Update `tailwind.config.js`

```js
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        ...,
        './vendor/filament/**/*.blade.php',
    ],

    theme: {
        extend: {
            ...,
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
            },
        },
    },
};
```

-   Update `vite.config.js`

```js

...

export default defineConfig({
    plugins: [
        laravel({
            input: [
                ...
                "resources/css/filament.css",
            ],
            ...
        }),
    ],
});
```

Note: create that file (`resources/css/filament.css`) and put this line of code:

```css
@import "../../vendor/filament/filament/resources/css/app.css";
```

-   Register the theme file in a service provider's boot() method:

> Note: Can create a new service provider or use existing file.

```php
use Filament\Facades\Filament;

Filament::serving(function () {
    // Using Vite
    Filament::registerViteTheme('resources/css/filament.css');
});
```

After the all above implemented, you can go to refresh page and see the result

-   Toggle dark mode on [Tailwindcss](https://tailwindcss.com/docs/dark-mode). Update `tailwind.config`:

```js
module.exports = {
    darkMode: "class",
    // ...
};
```

> Now you can refresh and see toggle menu on user profile menu

-   You can use custom collor pallete:

```js
module.exports = {
    // ...
    theme: {
        extend: {
            //...
            colors: {
                danger: colors.rose,
                primary: {
                    50: "#ecfeff",
                    100: "#ccfbf1",
                    200: "#a5f3fc",
                    300: "#67e8f9",
                    400: "#22d3ee",
                    500: "#06b6d4",
                    600: "#0891b2",
                    700: "#0e7490",
                    800: "#155e75",
                    900: "#164e63",
                },

                success: colors.green,
                warning: colors.yellow,
            },
        },
    },

    //...
};
```
