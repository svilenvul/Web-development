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
                            src: 'css/*.css'
                        }
                    }
                },
                cssmin: {
                    target:{
                        files: {     
                        'css/output.min.css':[
                            'css/style_parent.css',
                            'css/reset.css',
                            'css/960_24_col_responsive.css',
                            'css/style.css']
                        }
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
                db_dump: {
                    local: {
                        options: {
                            title: 'local',
                            database: 'test',
                            user: 'root',
                            pass: '',
                            host: '127.0.0.1',
                            backup_to: 'C:/Users/888/Google Диск/Asansiori/archives/db/test0504.sql'
                        }
                    }
                },
                gitadd: {
                    task: {
                        options: {
                            all: true
                        },
                        files: {
                            src: ['../../../../']
                        }
                    }
                },
                gitcommit: {
                    svilenvul: {
                        options: {
                            message: 'grunt commit'
                        },
                        files: {
                            src: ['../../../../']
                        }
                    }
                },
                gitpush: {
                    svilenvul: {
                        options: {
                            remote: 'origin',
                            branch: 'elevator'
                        }
                    }
                },
                copy: {
                    main: {
                        files: [
                            {
                                cwd: 'D:/GitHub/Web-development/PHP/wordpress/wp-content/themes/blackbird-child',
                                expand: true,
                                src: ['**/*',
                                    '!**/scss/**',
                                    '!**/node_modules/**',
                                    '!**/Gruntfile.js',
                                    '!**/npm-debug.log',
                                    '!**/package.json',
                                    '!**/validation-status.json',
                                    '!**/effects.js',
                                    '!**/reset.css',
                                    '!**/style.css',
                                    '!**/style_parent.css',
                                    '!**/960_24_col_responsive.css'
                                ],
                                dest: 'C:/Users/888/Google Диск/Asansiori/archives/files/wp-content/themes/blackbird-child'
                            }
                        ]
                    }
                },
                htmlmin: {
                    dist: {
                        options: {
                            removeComments: true                        
                        },
                        files: {
                            'C:/Users/888/Google Диск/Asansiori/archives/files/wp-content/themes/blackbird-child/*.php':'C:/Users/888/Google Диск/Asansiori/archives/files/wp-content/themes/blackbird-child/*.php'
                        }
                    }
                },
                clean: {
                    options: {
                        force:true
                    },
                    build: {
                        src:'C:/Users/888/Google Диск/Asansiori/archives/files/wp-content/themes/blackbird-child/**/*.*'
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
            grunt.loadNpmTasks('grunt-contrib-copy');
            grunt.loadNpmTasks('grunt-contrib-clean');
            //Register tasks
            grunt.registerTask('local', [
                'autoprefixer',
                'shell:xampp',
                'open',
                'browserSync',
                'watch'
            ]);
            grunt.registerTask('git', [
                'gitadd',
                'gitcommit',
                'gitpush'
            ]);
            grunt.registerTask('build',[                
                'autoprefixer',
                'cssmin',
                'uglify',
                'clean',
                'copy'
            ]);
        };
