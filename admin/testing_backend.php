<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 12/1/2015
 * Time: 10:38 PM
 */

require 'vendor/autoload.php';

use GuzzleHttp\Psr7\Request;
    function RunRequest(\GuzzleHttp\Client $client, $path)
    {
        $result = array();
        $result['Path'] = $path;
        $result["Count"] = 0;
        try {
            $response = $client->request("GET", "/backend" . $path);
            $result['Status'] = $response->getStatusCode();
            $result['Reason'] = $response->getReasonPhrase();
            $result['Type'] = gettype(json_decode($response->getBody()));

            if(strtolower($result['Type']) != "array") {
                $var = json_decode($response->getBody());
                foreach(get_object_vars ($var) as $v) {
                    $result["Count"] += count($v);
                }
            } else {
                $result["Count"] = count(json_decode($response->getBody()));
            }
        } catch(Exception $e) {
            $result['Type'] = '';
            $result['Status'] = "Exception";
            $result['Reason'] = $e->getMessage();
            $result["Count"] = 0;
        }
        return $result;
    }

    $basepath = 'http://www.moneyiq.jp/backend/';

    $client = new \GuzzleHttp\Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://www.moneyiq.jp/',
    // You can set any number of default request options.
    'timeout'  => 2.0,
]);

$items = array (
    '/display/issuers',
    '/display/affiliates',
    '/display/stores',
    '/display/reward/type/all',
    '/display/reward/category/all',
    '/display/creditcards',
    '/crud/reward/type/all',
    '/crud/reward/category/all',
    '/crud/pointsystem/all',
    '/crud/pointsystem/by/creditcard',
    '/crud/pointacquisition/all',
    '/crud/pointacquisition/by/pointsystem',
    '/crud/pointusage/all',
    '/crud/pointusage/by/pointsystem',
    '/crud/reward/all',
    '/crud/reward/by/pointsystem',
    '/crud/creditcard/pointsystem/mapping/all',
    '/crud/creditcard/pointsystem/mapping/by/creditcard',
    '/crud/creditcard/pointsystem/mapping/by/pointsystem',
    '/crud/issuer/all',
    '/crud/affiliate/all',
    '/crud/insurance/type/all',
    '/crud/feature/type/all',
    '/crud/feature/all',
    '/crud/feature/by/creditcard',
    '/crud/description/by/creditcard',
    '/crud/campaign/all',
    '/crud/campaign/by/creditcard',
    '/crud/discount/all',
    '/crud/discount/by/creditcard',
    '/crud/pointmapping/by/creditcard',
    '/crud/store/all',
    '/crud/insurance/all',
    '/crud/insurance/by/creditcard',
    '/crud/interest/all',
    '/crud/interest/by/creditcard',
    '/crud/fee/all',
    '/crud/fee/by/creditcard',
    '/crud/unit/all',
    '/crud/storecategory/all'
);
$counter=0;
?>
<html>
<head>
    <title>Rest api testing</title>
    <link rel="stylesheet" type="text/css" href="media/css/dataTables.editor.css">
    <link rel="stylesheet" type="text/css" href="media/css/admin_editor.css">
    <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
</head>
<body class="testing">
<h1>Rest API testing</h1>
<table class="testresult">
    <tr>
        <th>#</th>
        <th>URL</th>
        <th>Status</th>
        <th>Results</th>
        <th>Comment</th>
    </tr>
    <?php foreach ($items as $path): $response = RunRequest($client, $path) ; $counter++;
        if($response['Status']!="200" || $response['Count']<=0 || $response['Reason']!="OK"  ) {
            $class = "error";
        } else {
            $class=$counter % 2 == 0? "even":"odd";
        }
        ?>
        <tr class="<?php echo $class ?>">
            <td><?php echo $counter; ?></td>
            <td>
                <a href="<?php echo $basepath . $path ?>">
                    <?php echo $response['Path']; ?>
                </a>
            </td>
            <td><?php echo $response['Status']; ?></td>
            <td><?php echo $response['Count']; ?></td>
            <td><?php echo $response['Reason']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>


<?php


/*
'/crud/creditcards/by/id'
$app->post('/crud/creditcards/create'
$app->put('/crud/creditcards/update'
$app->delete('/crud/creditcards/delete'
$app->delete('/crud/reward/type/delete'
$app->post('/crud/reward/type/create'
$app->put('/crud/reward/type/update'
$app->delete('/crud/reward/category/delete'
$app->post('/crud/reward/category/create'
$app->put('/crud/reward/category/update'
$app->delete('/crud/pointsystem/delete'
$app->post('/crud/pointsystem/create'
$app->put('/crud/pointsystem/update'
'/crud/reward/type/by/id'
'/crud/reward/category/by/id'
'/crud/pointsystem/by/id'
'/crud/pointusage/by/id'
$app->delete('/crud/pointacquisition/delete'
$app->post('/crud/pointacquisition/create'
$app->put('/crud/pointacquisition/update'
'/crud/pointacquisition/by/id'
$app->delete('/crud/pointusage/delete'
$app->post('/crud/pointusage/create'
$app->put('/crud/pointusage/update'$app->delete('/crud/reward/delete'
$app->post('/crud/reward/create'
$app->put('/crud/reward/update'
'/crud/reward/by/id'
$app->delete('/crud/creditcard/pointsystem/mapping/delete'
$app->post('/crud/creditcard/pointsystem/mapping/create'
$app->put('/crud/creditcard/pointsystem/mapping/update'
$app->delete('/crud/issuer/delete'
$app->post('/crud/issuer/create'
$app->put('/crud/issuer/update'
$app->delete('/crud/affiliate/delete'
$app->post('/crud/affiliate/create'
$app->put('/crud/affiliate/update'
$app->delete('/crud/insurance/type/delete'
$app->post('/crud/insurance/type/create'
$app->put('/crud/insurance/type/update'
$app->delete('/crud/feature/type/delete'
$app->post('/crud/feature/type/create'
$app->put('/crud/feature/type/update'
$app->delete('/crud/feature/delete'
$app->post('/crud/feature/create'
$app->put('/crud/feature/update'
$app->delete('/crud/feature/by/creditcard/delete'
$app->post('/crud/feature/by/creditcard/create'
$app->put('/crud/feature/by/creditcard/update'
$app->delete('/crud/description/by/creditcard/delete'
$app->post('/crud/description/by/creditcard/create'
$app->put('/crud/description/by/creditcard/update'
$app->delete('/crud/campaign/delete'
$app->post('/crud/campaign/create'
$app->put('/crud/campaign/update'
$app->delete('/crud/discount/delete'
$app->post('/crud/discount/create'
$app->put('/crud/discount/update'
$app->delete('/crud/pointmapping/by/creditcard/delete'
$app->post('/crud/pointmapping/by/creditcard/create'
$app->put('/crud/pointmapping/by/creditcard/update'
$app->delete('/crud/store/delete'
$app->post('/crud/store/create'
$app->put('/crud/store/update'
$app->delete('/crud/insurance/delete'
$app->post('/crud/insurance/create'
$app->put('/crud/insurance/update'
$app->delete('/crud/interest/delete'
$app->post('/crud/interest/create'
$app->put('/crud/interest/update'
$app->delete('/crud/fee/delete'
$app->post('/crud/fee/create'
$app->put('/crud/fee/update'
$app->delete('/crud/unit/delete'
$app->post('/crud/unit/create'
$app->put('/crud/unit/update'
'/crud/unit/by/id'
$app->delete('/crud/storecategory/delete'
$app->post('/crud/storecategory/create'
$app->put('/crud/storecategory/update'
'/crud/storecategory/by/id'
*/
    ?>