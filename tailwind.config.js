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
    },
  },
  plugins: [],
}

