<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require '../src/vendor/autoload.php';
$app = new \Slim\App;

// Define the database connection details outside of the route callbacks
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";

// Define the PDO connection outside of the route callbacks
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*
$app->get('/orgstructJSON', function (Request $request, Response $response,
array $args) {
$data = file_get_contents('orgstructure/');
$jsonData = json_encode($data, JSON_PRETTY_PRINT);
echo $jsonData;
});
*/

// Endpoint to get a greeting
$app->get('/getName/{fname}/{lname}', function (Request $request, Response $response, array $args) {
    $name = $args['fname']." ".$args['lname'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

// Endpoint to post a name
$app->post('/postName', function (Request $request, Response $response, array $args) use ($conn) {
    $data = json_decode($request->getBody());
    $fname = $data->fname;
    $lname = $data->lname;
    

    try {
        $sql = "INSERT INTO names (lname, fname) VALUES ('$lname', '$fname')";
        $conn->exec($sql);
        $response->getBody()->write(json_encode(array("status" => "success", "data" => null)));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(array("status" => "error", "message" => $e->getMessage())));
    }

    return $response;
});

// Endpoint to post and print data
$app->get('/getName', function (Request $request, Response $response, array $args) use ($conn) {
    $result = $conn->query("SELECT * FROM names");

    if ($result->rowCount() > 0) {
        $data = array();
        while ($row = $result->fetch()) {
            $data[] = array("fname" => $row["fname"], "lname" => $row["lname"]);
        }
        $data_body = array("status" => "success", "data" => $data);
        $response->getBody()->write(json_encode($data_body));
    } else {
        $response->getBody()->write(json_encode(array("status" => "success", "data" => null)));
    }

    return $response;
});

$app->run();