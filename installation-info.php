<?php 
 require_once 'core/init.php';

    if (!$_SESSION) {
        header('Location: index.php');
    }
    $client_id = $_SESSION['client_id'];

$id = $_GET['id'];

$subscription = $subscriptioncon->subscriptionData($id);
$estimated = $subscription->added;
$addedvalue = $subscription->addon;
$wire = $addedvalue / 7;


$newday = $subscription->getDateFromDay();
$newdate= date("d", strtotime($newday));
$totaldate  = date("t");
$dayleft    = $totaldate - $newdate;

$bundle = $bundlecon->bundleCode($subscription->types);


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<style>
	table, th, td {
	  border: 1px solid black;
	  border-collapse: collapse;
	}
</style>
</head>
<body>

	<table>
  <tr>
  <th colspan="3">Payable</th>
  </tr>
  <tr>
      <td>
          <b>Service</b><br>
      </td>
      <td>
          <b>Quantity</b><br>
      </td>
      <td>
          <b>Amount</b><br>
      </td>
  </tr>
      <tr>
        <td>
            <?php echo "$bundle->name"; ?>
        </td>
      <td>
            x 1
      </td>
      <td align="right">
            <?php echo $bundle->getBundlePrice(); ?>
      </td>
  </tr>

<?php if ($bundle->getPrefix() == "B"): ?>
  <tr>
    <td>Digital and Cable</td>
    <td>x 1</td>
    <td align="right"><?php echo "&#x20b1; ". $bundle->getAddedValue().".00"; ?></td>
  </tr>

  <tr>
    <td>Advance 1 month</td>
    <td>x 1</td>
    <td align="right">&#x20b1; <?php echo $bundle->price.".00"; ?></td>
  </tr>

  <tr>
    <td>Day left this month</td>
    <td><?php echo $dayleft; ?> days</td>
    <td align="right">&#x20b1;<?php echo $addedvalue; ?>.00</td>
  </tr>

  <tr>
    <td>Wire Added</td>
    <td>x <?php echo $wire."ft"; ?></td>
    <td align="right">&#x20b1;<?php echo $estimated.".00"; ?></td>
  </tr>

<?php endif ?>
  <tr>
    <td></td>
    <td>Total</td>
    <td align="right">&#x20b1; <?php echo ($bundle->price * 2) + $addedvalue + $estimated.".00"; ?></td>
  </tr>
</table>

</body>
</html>