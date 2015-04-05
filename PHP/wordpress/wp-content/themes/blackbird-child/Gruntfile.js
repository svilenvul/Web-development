/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
module.exports = function (grunt) {
    // Project configuration.   
    grunt.initConfig({
        autoprefixer: {
            compile: {
                files: {
                    'css/style.css': 'css/style.css'
                }
            }
        },
        cssmin: {
            clean: {
                'css/style.css': 'css/test.css'
            }
        },
        uglify: {
            bower_js_files: {
                options: {
                    sourceMap: true,
                    sourceMapName: 'sourceMap.map'
                },
                files: {
                    'js/output.min.js': [
                        '../blackbird/js/ddsmoothmenu.js',
                        '../blackbird/js/jquery.flexslider-min.js',
                        '../blackbird/js/slides.min.jquery.js',
                        '../blackbird/js/jquery.validate.min.js',
                        '../blackbird/js/custom.js',                         
                        'js/effects.js'
                    ]
                }
            }
        },
        watch: {
            all: {
                files: [
                    '**/*.php',
                    'css/**/*.css',
                    'style.css',
                    'js/**/*.js'
                ],
                options: {
                    livereload: 35729
                }
            }
        },
        // grunt-open will open your browser at the project's URL
        open: {
            chrome: {
                path: 'http://localhost:1234/wordpress'
            },
            firefox: {
                path: 'http://localhost:1234/wordpress',
                app: 'Firefox'
            }
        },
        shell: {
            xampp: {
                command: 'c:/xampp/xampp_start'
            }
        },
        browserSync: {
            dev: {
                bsFiles: {
                    src: [
                        'style.css',
                        'js/**/*.js',
                        '**/*.php',
                        'css/**/*.css']
                },
                options: {
                    proxy: "localhost:1234",
                    watchTask: true,
                    ghostMode: {
                        scroll: true,
                        links: true,
                        forms: true
                    }
                }
            }
        },
        validation: {
            options: {
                reportpath: 'C:/Users/888/Desktop/validation-report.json'
                        //remoteFiles:'D:\GitHub\Web-development\PHP\wordpress\wp-content\themes\blackbird-child'
            },
            files: {
                src: 'D:/GitHub/Web-development/PHP/wordpress/wp-content/themes/blackbird-child/**/*.php'
            }
        },
        db_dump : {
            local: {
                options: {
                    title: 'local',
                    
                    database: 'test',
                    user: 'root',
                    pass: '',
                    host: '127.0.0.1',
                    
                    backup_to:'C:/Users/888/Google Диск/Asansiori/archives/db/test0504.sql'
                }
            } 
        },
        gitadd: {
            task: {
                options:{
                    all: true
                },
                files: {
                    src:['../../../../']
                }
            }
        },
        gitcommit: {
            svilenvul: {
                options: {
                    message:'grunt commit'
                },
                files: {
                    src:['../../../../']
                }
            }
        },
        gitpush: {
           svilenvul: {
               options: {
                   remote:'origin',
                   branch:'elevator'
               }
           } 
        }
    });

    //Load plugins
    grunt.loadNpmTasks('grunt-mysql-dump');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    //grunt.loadNpmTasks('grunt-express');
    grunt.loadNpmTasks('grunt-open');
    grunt.loadNpmTasks('grunt-shell');
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-html-validation');
    grunt.loadNpmTasks('grunt-git');
    
    //Register tasks
    grunt.registerTask('server', [
        'shell:xampp',
        'open',
        'browserSync',
        'watch'
    ]);
};
