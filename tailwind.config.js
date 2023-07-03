/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./**/*.{php, html, js}",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'global': "url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=872&q=80')",
        'phone': "url('https://images.pexels.com/photos/1416530/pexels-photo-1416530.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')",

      }
    },
  },
  plugins: [],
}



