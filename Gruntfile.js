module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),


    sass: {
      options: {
        includePaths: ['bower_components/foundation/scss']
      },
      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'css/app.css': 'scss/app.scss'
        }        
      }
    },

    autoprefixer: {
        single_file: {
          options: {
            browsers: ['last 2 version', 'ie 8', 'ie 7']
          },
          src: 'css/app.css',
          dest: 'css/app.css'
        },
      },

    concat: {   
      app: {
        src: [
            'bower_components/jquery/jquery.js', 
            'bower_components/enquire/dist/enquire.js',
            'bower_components/foundation/js/foundation.min.js',
            'bower_components/foundation/js/foundation/foundation-interchange.js',
            'bower_components/foundation/js/foundation/foundation-abide.js',
            'bower_components/foundation/js/foundation/foundation-clearing.js',
            'bower_components/foundation/js/foundation/foundation-equalizer.js',
            'bower_components/imagesloaded/imagesloaded.js',
            'bower_components/isotope/isotope_beta.js',
            'bower_components/verge/verge.js', 
            'js/app.js'
        ],
        dest: 'js/build/app.js',
      }
    },

    uglify: {
       app: {
          files: {
            'js/build/app.min.js': ['js/build/app.js']
          }
        }
    },

    watch: {
      grunt: { files: ['Gruntfile.js'] },

      sass: {
        files: 'scss/**/*.scss',
        tasks: ['sass', 'autoprefixer']
      },

      concat: {
        files: 'js/*.js',
        tasks: ['concat', 'uglify']
      },
      
      options: {
          livereload: true,
        }
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('build', ['sass', 'autoprefixer', 'concat', 'uglify']);
  grunt.registerTask('default', ['build','watch']);
}