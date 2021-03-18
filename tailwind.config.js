const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        flex: {
            'full': '1 0 100%',
        },
        extend: {
            backgroundImage: theme => ({
         'jan': "url('https://images.unsplash.com/photo-1558980971-97f50d0fed00?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=992&q=80')",
        }),
            fontFamily: {
                sans: ['Archivo Narrow', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
            require('@tailwindcss/forms'),
            require('tailwindcss-pseudo-elements'),
            plugin(({addUtilities}) => {
                const newUtilities = {
                    ".empty-content": {
                        content: "''",
                        background: "white",
                        display: "block",
                        height: "1px",
                    },
                    }
                    addUtilities(newUtilities, {
                        variants: ["before", "after"],
                    });
                })
    ],
};
