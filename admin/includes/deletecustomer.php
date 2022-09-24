<?php include "../../includes/init.php";
if (empty($_GET['id'])) {
    redirect("../customer.php");
}
$customer = Customer::find_by_id($_GET['id']);
if ($customer) {
    $customer->delete();
    redirect("../customer.php");
} else {
    redirect("../customer.php");
}
