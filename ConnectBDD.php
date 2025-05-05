<?php

function bdd_request(string $SQLrequest, array $parameters = null){
    $HOST = 'localhost';
    $DB_NAME = 'planning';
    $DB_USER = 'root';
    $DB_PASSWORD = '';

    $bdd = new PDO('mysql:host='.$HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASSWORD, array(
        PDO::ATTR_PERSISTENT => true
    ));

    $request =$bdd->prepare($SQLrequest);
    $request->execute($parameters);
    $response = $request->fetchAll();
    return $response;
} 

// $usersRequest =$bdd->prepare('SELECT * FROM users');
// $usersRequest->execute();
// $users = $usersRequest->fetchAll();
