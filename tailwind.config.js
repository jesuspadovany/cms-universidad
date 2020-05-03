module.exports = {
  theme: {
    extend: {
    	colors: {
    		primary: {
          lighter: '#ff3659',
    			default: '#E01D3F',
          darker: '#cc082a'
    		}
    	}
    },
  },
  variants: {
    padding: ['responsive', 'odd', 'even'],
    backgroundColor: ['responsive', 'hover', 'focus', 'odd', 'even']
  },
  plugins: [],
}
