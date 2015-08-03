module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        options: {
          style: 'compressed'
        },
        files: [{
          expand: true,
          cwd: 'assets/marvin',
          src: ['**/sass/*.scss'],
          dest: 'assets/marvin',
          ext: '.css',
          rename: function (dest, src) {
            return dest +'/'+ src.replace(/sass/, 'css');
          }
        }]
      }
    },
    watch: {
      styles: {
        files: ['assets/marvin/**/*.scss'],
        tasks: ['css'],
        options: {
          debounceDelay: 250
        }
      }
    },
    jshint: {
      files: ['assets/marvin/*/js/**/*.js']
    },
    qunit: {
      all: ['assets/marvin/*/test.html']
    },
    copy: {
      main: {
        files: [
          {
            expand: true,
            src: ['../vendor/marvin/*/Assets/**'],
            dest: 'assets/',
            rename: function (dest, src) {
              return src.replace(/(\/Assets){1}/, '').replace(/\.\.\/vendor\//, dest);
            }
          },
          {
            expand: true,
            src: ['../app/themes/*/Assets/**'],
            dest: 'assets/marvin/themes/',
            rename: function (dest, src) {
              return src.replace(/(\/Assets){1}/, '').replace(/\.\.\/app\/themes\//, dest);
            }
          }
        ]
      }
    },
    bower: {
      build: {
        options: {
          targetDir: './',
          install: true,
          cleanTargetDir: false,
          verbose: false,
          copy: false,
          cleanBowerDir: false,
          layout: 'byComponent',
          bowerOptions: {
            forceLatest: true,
            production: false
          }
        },
        src: [
          '**/bower.json',
          '!**/node_modules/**/*',
          '!**/bower_components/**/*'
        ]
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-qunit');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-bower-task');

  // Default task(s).
  grunt.registerTask('install', ['copy', 'bower', 'css']);
  grunt.registerTask('test', ['jshint', 'qunit']);
  grunt.registerTask('js', ['test']);
  grunt.registerTask('css', ['sass']);
  grunt.registerTask('default', ['js', 'css']);

};
