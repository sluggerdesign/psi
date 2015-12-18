module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
    	css: {
		    files: ['library/content/styles/*.scss'],
		    tasks: ['sass'],
		    options: {
		        spawn: false,
		        livereload: true
		    }
		}
    },
    sass: {
	    dist: {
	        options: {
	            style: 'compressed'
	        },
	        files: {
	            'library/content/styles/main.css': 'library/content/styles/main.scss',
                'library/content/styles/foundation.css': 'node_modules/foundation-sites/foundation-sites.scss'
	        }
	    }
	}
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['sass', 'watch']);
};
