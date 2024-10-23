/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
  ],
  theme: {
    extend: {
      screens: {
        mobile: '320px',
      },
      colors: {
        primaryBlue: '#003366',
        primaryCornFlowerBlue: '#698BFF',
        primaryRichBlack: '#01001C',
        primaryOrangeWeb: '#FFAB38',
        secondaryAntiFlashWhite: '#F4F6FA',
        secondaryBlue: '#014e81',
        secondaryRoyalBlue: '#526DCA',
        secondaryNeonBlue: '#3F6AFF',
        secondaryPeriwinkle: '#BFCEFF',
        secondaryLawenderWeb: '#E4EDFF',
        secondaryEarthBlue: '#284ECE',
        secondaryFrenchGrey: '#B6BAC2',
        secondaryFrenchGrey2: '#C6CEDE',
        secondaryPeriWinkle2: '#8C9BCE',
        secondaryMint: '#3DBC94',
        secondaryImperialRed: '#FB3640',
        secondaryTaupeGrey: '#777684',
      },
    },
  },
  plugins: [],
}
