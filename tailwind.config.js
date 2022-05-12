module.exports = {
  darkMode: 'class',
  content: [
    "./*.{html,js}",
    "./src/**/*.{html,js}",
    "./panel/**/*.{html,js}",
    "./admin/**/*.{html,js}",

  ],
  theme: {
    extend: {
      animation: {
        'fadeInDown': 'fadeInDown 0.45s ease-in'
      },
      brightness: {
        '65': '.65'
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
        'btn': ' 0px 4px 16px rgba(51, 112, 202, 0.48)',
        'cta-btn': '0px 12px 32px rgba(79, 82, 255, 0.48)',
        'slider': '0px 16px 64px rgba(22, 20, 20, 0.12)',
        'map': '0px 0px 24px rgba(0, 0, 0, 0.06)',
        'section': '0px 0px 36px rgba(39, 40, 45, 0.08)',
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
        '28': '28px',
        '32': '32px',
        '36': '36px',
        '42': '42px',
        '48': '48px',
        '52': '52px',
        '56': '56px',
        '64': '64px',
        '82': '82px',
      },
      spacing: {
        '4': '4px',
        '8': '8px',
        '12': '12px',
        '16': '16px',
        '18': '18px',
        '20': '20px',
        '24': '24px',
        '28': '28px',
        '32': '32px',
        '36': '36px',
        '42': '42px',
        '48': '48px',
        '52': '52px',
        '56': '56px',
        '64': '64px',
      },
      letterSpacing: {
        headers: '-0.02em'
      },
      lineHeight: {
        text: '1.4em'
      },
      borderRadius: {
        '4': '4px',
        '8': '8px',
        '10': '10px',
        '12': '12px',
        '16': '16px',
        '20': '20px',
        '24': '24px',
        '28': '28px',
        '32': '32px',
        '36': '36px',
      }
    },
    colors: {
      'brand': {
        '900': '#375DE1',
        '800': '#5E89E3',
        '700': '#BDD0FB',
      },
      'light': {
        '900': '#CDCDCD',
        '800': '#D0D0D0',
        '700': '#EAEAEA',
        '600': '#F3F3F3',
        '500': '#FAFAFA',
        '400': '#FEFEFE',
      },
      'black': {
        '900': '#252525',
        '800': '#606060'
      },
      'dark': {
        '900': '#100F0F',
        '800': '#181717',
        '700': '#202020',
      },
      'state': {
        'success': '#27AE60',
        'error': '#FB7474',
      }
    },
    screens: {
      ad: '340px',
      ph: '410px',
      tb: '620px',
      lg: '1200px',
      md: '1460px',
      xl: '1780px',
    }
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}
