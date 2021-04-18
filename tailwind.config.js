const defaultTheme = require("tailwindcss/defaultTheme");
const plugin = require("tailwindcss/plugin");

module.exports = {
    purge: [
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        borderColor: (theme) => ({
            ...theme("colors"),
            DEFAULT: theme("colors.gray.300", "currentColor"),
            primary: "#3490dc",
            secondary: "#dba63c",
            danger: "#e3342f",
        }),
        flex: {
            full: "1 0 100%",
        },
        extend: {
            backgroundImage: (theme) => ({
                jan:
                    "url('https://images.unsplash.com/photo-1558980971-97f50d0fed00?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=992&q=80')",
            }),
            fontFamily: {
                title: ["Montserrat", ...defaultTheme.fontFamily.sans],
                sans: ["Archivo Narrow", ...defaultTheme.fontFamily.sans],
            },
            transitionTimingFunction: {
                "in-expo": "cubic-bezier(0.95, 0.05, 0.795, 0.035)",
                "out-expo": "cubic-bezier(0.19, 1, 0.22, 1)",
                ease: "ease",
            },
            colors: {
                blue: {
                    450: "#5F99F7",
                },
                yellow: {
                    550: "#DBA63C",
                },
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
            brightness: ["hover", "focus"],
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("tailwindcss-pseudo-elements"),
        plugin(({ addUtilities }) => {
            const newUtilities = {
                ".empty-content": {
                    content: "''",
                    background: "white",
                    display: "block",
                    height: "1px",
                },
            };
            addUtilities(newUtilities, {
                variants: ["before", "after"],
            });
        }),
    ],
};
