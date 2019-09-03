<?php
header('Content-Type: application/json');

  require '../Requests-master/library/Requests.php';
  Requests::register_autoloader();
  require '../lib/culqi.php';

use Culqi\Culqi;

$SECRET_API_KEY = 'sk_test_MC8mbT7XkJ4qRi6n';
$culqi = new Culqi(array('api_key' => $SECRET_API_KEY));
try {
  // Creando Cargo a una tarjeta
  $charge = $culqi->Charges->create(
      array(
        "amount" => 3000,
        "currency_code" => "PEN",
        "email" => $_POST["email"],
        "source_id" => $_POST["token"],
        "installments" => $_POST["cuotas"],
        "capture" => "false"
      )
  );
  // Response
  echo json_encode($charge);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}
?>


