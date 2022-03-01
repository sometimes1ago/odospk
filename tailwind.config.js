module.exports = {
  content: [
    "./*.{html,js}",
    "./src/**/*.{html,js}",
    "./panel/**/*.{html,js}",

  ],
  theme: {
    extend: {
      animation: {
        'fadeInDown': 'fadeInDown 0.45s ease-in'
      },
      keyframes: {
        'fadeInDown': {
          '0%': {
              opacity: '0', 
              transform: 'translateY(-25px)'
          },
          '100%': {
            opacity: '1',
            transform: 'translateY(0)'
          }
        }
      },
      boxShadow: {
        'menu-lg': '4px 0px 24px rgba(39, 40, 45, 0.08)',
        'query-control': '0px 4px 16px rgba(39, 40, 45, 0.08)',
        'selector': '0px 0px 30px rgba(37, 37, 37, 0.16)',
        'btn': ' 0px 4px 16px rgba(51, 112, 202, 0.5)'
      },
      fontFamily: {
        sans: ['Geometria', 'sans-serif'],
      },
      fontSize: {
        '10': '10px',
        '12': '12px',
        '14': '14px',
        '16': '16px',
        '18': '18px',
        '20': '20px',
        '22': '22px',
        '24': '24px',
        '32': '32px',
        '36': '36px',
        '42': '42px'
      },
      spacing: {
        '4': '4px',
        '8': '8px',
        '12': '12px',
        '16': '16px',
        '18': '18px',
        '20': '20px',
        '24': '24px',
        '32': '32px',
        '36': '36px',
        '42': '42px',
        '48': '48px',
        '52': '52px',
        '64': '64px'
      },
      borderRadius: {
        '8': '8px',
        '12': '12px',
        '16': '16px',
        '20': '20px',
        '24': '24px'
      }
    },
    colors: {
      'accent': '#3B7FE4',
      'selected': '#5E89E3',
      'stroke': '#E6E6E6',
      'hover': '#EAEAEA',
      'main': '#FEFEFE',
      'add': '#F3F3F3',
      'primary': '#252525',
      'imp': '#505050',
      'sec': '#757575',
      'success': '#27AE60',
      'error': '#FB7474'
    },
    screens: {
      ad: '340px',
      ph: '410px',
      tb: '740px',
      bt: '1000px',
      lg: '1300px',
      xl: '1900px'
    }
  },
  plugins: [],
}
