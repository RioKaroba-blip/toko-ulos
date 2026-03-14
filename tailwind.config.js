import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
                display: ['Playfair Display', 'serif'],
            },
            colors: {
                'batak-brown': '#8B4513',
                'batak-orange': '#D2691E',
                'batak-gold': '#FFD700',
                'batak-dark': '#2C1810',
                'batak-light': '#F5F5F5',
            },
            animation: {
                'fade-in': 'fadeIn 1s ease-in-out',
                'slide-up': 'slideUp 0.8s ease-out',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(30px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
            }
        },
    },

    plugins: [forms],
};
