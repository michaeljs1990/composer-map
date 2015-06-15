# cmap
Map the dependency graph of composer packages

    php app.php graph laravel/framework
    php app.php graph laravel/framework --map

### Examples

    php app.php graph laravel/laravel
    44 required dependencies

    php app.php graph laravel/laravel --graph
    {
        "package": {
            "laravel\/laravel": "dev-master"
        },
        "dependencies": [
            {
                "package": {
                    "laravel\/framework": "5.1.*"
                },
                "dependencies": [
                    {
                        "package": {
                            "swiftmailer\/swiftmailer": "~5.1"
                        },
                        "dependencies": [
                            {
                                "package": {
                                    "egulias\/email-validator": "~1.2"
                                },
                                "dependencies": [
                                    {
                                        "package": {
                                            "doctrine\/lexer": "~1.0,>=1.0.1"
                                        },
                                        "dependencies": []
                                    }
                                ]
                            }
                        ]
                    },
                    {
                        "package": {
                            "vlucas\/phpdotenv": "~1.0"
                        },
                        "dependencies": []
                    },
                    {
                        "package": {
                            "mtdowling\/cron-expression": "~1.0"
                        },
                        "dependencies": []
                    },
                    {
                        "package": {
                            "league\/flysystem": "~1.0"
                        },
                        "dependencies": []
                    },
                    {
                        "package": {
                            "monolog\/monolog": "~1.11"
                        },
                        "dependencies": [
                            {
                                "package": {
                                    "psr\/log": "~1.0"
                                },
                                "dependencies": []
                            }
                        ]
                    },
                    {
                        "package": {
                            "doctrine\/inflector": "~1.0"
                        },
                        "dependencies": []
                    },
                    {
                        "package": {
                            "danielstjules\/stringy": "~1.8"
                        },
                        "dependencies": []
                    },
                    {
                        "package": {
                            "classpreloader\/classpreloader": "~1.2"
                        },
                        "dependencies": [
                            {
                                "package": {
                                    "symfony\/console": "~2.1"
                                },
                                "dependencies": []
                            },
                            {
                                "package": {
                                    "symfony\/filesystem": "~2.1"
                                },
                                "dependencies": []
                            },
                            {
                                "package": {
                                    "symfony\/finder": "~2.1"
                                },
                                "dependencies": []
                            },
                            {
                                "package": {
                                    "nikic\/php-parser": "~1.3"
                                },
                                "dependencies": []
                            }
                        ]
                    },
                    {
                        "package": {
                            "jeremeamia\/superclosure": "~2.0"
                        },
                        "dependencies": [
                            {
                                "package": {
                                    "nikic\/php-parser": "~1.2"
                                },
                                "dependencies": []
                            }
                        ]
                    },
                    {
                        "package": {
                            "psy\/psysh": "0.4.*"
                        },
                        "dependencies": [
                            {
                                "package": {
                                    "nikic\/php-parser": "~1.0"
                                },
                                "dependencies": []
                            },
                            {
                                "package": {
                                    "dnoegel\/php-xdg-base-dir": "0.1"
                                },
                                "dependencies": []
                            },
                            {
                                "package": {
                                    "symfony\/console": "~2.3.10|~2.4.2|~2.5"
                                },
                                "dependencies": []
                            },
                            {
                                "package": {
                                    "jakub-onderka\/php-console-highlighter": "0.3.*"
                                },
                                "dependencies": [
                                    {
                                        "package": {
                                            "jakub-onderka\/php-console-color": "~0.1"
                                        },
                                        "dependencies": []
                                    }
                                ]
                            }
                        ]
                    },
                    {
                        "package": {
                            "nesbot\/carbon": "~1.19"
                        },
                        "dependencies": [
                            {
                                "package": {
                                    "symfony\/translation": "~2.6"
                                },
                                "dependencies": []
                            }
                        ]
                    },
                    {
                        "package": {
                            "symfony\/console": "2.8.*"
                        },
                        "dependencies": []
                    },
                    {
                        "package": {
                            "symfony\/css-selector": "2.8.*"
                        },
                        "dependencies": []
                    },
                    {
                        "package": {
                            "symfony\/debug": "2.8.*"
                        },
                        "dependencies": [
                            {
                                "package": {
                                    "psr\/log": "~1.0"
                                },
                                "dependencies": []
                            }
                        ]
                    },
                    {
                        "package": {
                            "symfony\/dom-crawler": "2.8.*"
                        },
                        "dependencies": []
                    },
                    {
                        "package": {
                            "symfony\/finder": "2.8.*"
                        },
                        "dependencies": []
                    },
                    {
                        "package": {
                            "symfony\/http-foundation": "2.8.*"
                        },
                        "dependencies": []
                    },
                    {
                        "package": {
                            "symfony\/http-kernel": "2.8.*"
                        },
                        "dependencies": [
                            {
                                "package": {
                                    "psr\/log": "~1.0"
                                },
                                "dependencies": []
                            },
                            {
                                "package": {
                                    "symfony\/event-dispatcher": "~2.8|~3.0"
                                },
                                "dependencies": []
                            },
                            {
                                "package": {
                                    "symfony\/http-foundation": "~2.8|~3.0"
                                },
                                "dependencies": []
                            },
                            {
                                "package": {
                                    "symfony\/debug": "~2.8|~3.0"
                                },
                                "dependencies": [
                                    {
                                        "package": {
                                            "psr\/log": "~1.0"
                                        },
                                        "dependencies": []
                                    }
                                ]
                            }
                        ]
                    },
                    {
                        "package": {
                            "symfony\/process": "2.8.*"
                        },
                        "dependencies": []
                    },
                    {
                        "package": {
                            "symfony\/routing": "2.8.*"
                        },
                        "dependencies": []
                    },
                    {
                        "package": {
                            "symfony\/translation": "2.8.*"
                        },
                        "dependencies": []
                    },
                    {
                        "package": {
                            "symfony\/var-dumper": "2.8.*"
                        },
                        "dependencies": []
                    }
                ]
            }
        ]
    }

    
### Flags

##### map
Map will print out a pretty json array of all the dependencies.
    
After waiting a few seconds up to a minute depending on the size of the project a report will be generated. Everything is currently generated off of dev-master but I plan to add in some way to use the versions properly. Although if you are using up to date software you shouldn't notice any difference.