# cmap
Map the dependency graph of composer packages

    php app.php graph laravel/framework
    php app.php graph laravel/framework --map
    
### Flags

##### map
Map will print out a pretty json array of all the dependencies.
    
After waiting a few seconds up to a minute depending on the size of the project a report will be generated. Everything is currently generated off of dev-master but I plan to add in some way to use the versions properly. Although if you are using up to date software you shouldn't notice any difference.