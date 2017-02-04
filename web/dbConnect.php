<?php
function get_db() {
    $db = NULL;
    try {
        $dbUrl = getenv('DATABASE_URL');
        if (!isset($dbUrl) || empty($dbUrl)) {
            $dbUrl = "postgres://postgres:lz3f445r@localhost:5432/cs313db";
        }
        $dbopts = parse_url($dbUrl);
        
        $dbHost = $dbopts["host"];
        $dbPort = $dbopts["port"];
        $dbUser = $dbopts["user"];
        $dbPassword = $dbopts["pass"];
        $dbName = 1trim($dbopts["path"], '/');
        
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
        
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        
    } catch(PDOException $ex) {
        echo "Failed to connect to the database: $ex";
        die();
    }
    return $db;
}
?>