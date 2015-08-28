<?php
if (empty($_ENV['PLATFORM_RELATIONSHIPS'])){
/*
You would put here your local configuration for example:
//define('WP_HOME', "http://localhost");
//define('WP_SITEURL',"http://localhost");  
//define('DB_NAME', "my_wordpress");
//define('DB_USER', "admin");
//define('DB_PASSWORD', "trustknow1");
//define('DB_HOST', "127.0.0.1");
//define('DB_CHARSET', 'utf8');
//define('DB_COLLATE', '');
*/
} else {
    // This is where we get the relationships of our application dynamically
    //from Platform.sh
    
    $relationships = json_decode(base64_decode($_ENV['PLATFORM_RELATIONSHIPS']), TRUE);
  
    // We are using the first relationship called "database" found in your
    // relationships. Note that you can call this relationship as you wish
    // in you .platform.app.yaml file, but 'database' is a good name.
    define('DB_NAME', $relationships['database'][0]['path']);
    define('DB_USER', $relationships['database'][0]['username']);
    define('DB_PASSWORD', $relationships['database'][0]['password']);
    define('DB_HOST', $relationships['database'][0]['host']);
    define('DB_CHARSET', 'utf8');
    define('DB_COLLATE', '');
  
    // Decode Platform routes (as these are dynamically generated).
    $routes = json_decode(base64_decode($_ENV['PLATFORM_ROUTES']), TRUE);
  
    // Change site URL per environment.
    define('WP_HOME', key($routes));
    define('WP_SITEURL', key($routes));    
}
// Since you can have multiple installations in one database, you need a unique
// prefix.
$table_prefix  = 'wp_';
// Default PHP settings.
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);
ini_set('session.gc_maxlifetime', 200000);
ini_set('session.cookie_lifetime', 2000000);
ini_set('pcre.backtrack_limit', 200000);
ini_set('pcre.recursion_limit', 200000);
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');