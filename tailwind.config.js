/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                "open-sans": ["Open Sans", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
                montserrat: ["Montserrat", "sans-serif"],
            },
            colors: {
                utama: "#9E1111",
                theme: "#8C0F0F",
                theme2: '#D91111',
                hoverTheme: "#BA7979",
                font: "#814C4C",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
