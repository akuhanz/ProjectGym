/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container:{
      center: true,
      padding: '16px',
    },
    extend: {
      colors: {
      primary: '#8b5cf6',
      secondary: '#64748b',
      dark: '#0f172a',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: 0 },
          '100%': { opacity: 1 },
        },
        fadeOut: {
          '0%': { opacity: 1 },
          '100%': { opacity: 0 },
        },
      },
      animation: {
        fadeIn: 'fadeIn 0.5s forwards',
        fadeOut: 'fadeOut 0.5s forwards',
      },
    },
  },
  plugins: [],
}

