<?php
/*
	Template Class
	Handles all templating tasks
*/

class Template
{
	/*
		Construtor
	*/
	function __construct() {}
	
	/*
		Functions
	*/
	function displayPendingOrders(){

		global $Database;
		$table='';

		$sql = "SELECT * FROM orders WHERE restaurantId='".$_SESSION['id']."' AND completed !='1' ";
    $result = $Database->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

			$sqlCustomerInfo = "SELECT * FROM users WHERE id='".$row["customerId"]."'";
			$resultCustomerInfo = $Database->query($sqlCustomerInfo);
			$resultCustomerInfoRow = $resultCustomerInfo->fetch_assoc();

			$sqlDishInfo = "SELECT * FROM items WHERE id='".$row["itermId"]."'";
			$resultDishInfo = $Database->query($sqlDishInfo);
			$resultDishInfoRow = $resultDishInfo->fetch_assoc();

			$table.='
			<tr>
            <td>'. $resultCustomerInfoRow['username'] .'</td>
            <td>'. $resultDishInfoRow['title'] .'</td>
            <td>'. $resultCustomerInfoRow['address'] .'</td>
            <td>'. $row["orderNumber"] .'</td>
            <td><a class="button special small" id="orderComplete" data-id="'. $row["id"] .'">Complete</a></td>
          </tr>
			';
		}
} 
	echo $table;	
	}

	function displayCompletedOrders(){

		global $Database;
		$table='';

		$sql = "SELECT * FROM orders WHERE restaurantId='".$_SESSION['id']."' AND completed ='1' ";
    $result = $Database->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

			$sqlCustomerInfo = "SELECT * FROM users WHERE id='".$row["customerId"]."'";
			$resultCustomerInfo = $Database->query($sqlCustomerInfo);
			$resultCustomerInfoRow = $resultCustomerInfo->fetch_assoc();

			$sqlDishInfo = "SELECT * FROM items WHERE id='".$row["itermId"]."'";
			$resultDishInfo = $Database->query($sqlDishInfo);
			$resultDishInfoRow = $resultDishInfo->fetch_assoc();

			$table.='
			<tr>
						<td>'. $row["orderNumber"] .'</td>
            <td>'. $resultDishInfoRow['title'] .'</td>
						<td>'. $resultCustomerInfoRow['username'] . ' : ' .$resultCustomerInfoRow['address'] .'</td>
						<td>'.  $row["orderDate"]  .'</td>
      </tr>
			';
		}
} 
	echo $table;	
	}

	function displayVegetarianOptions(){

		global $Database;
		if( isset($_SESSION['username'])  && $_SESSION['usertype']=='2'){
			$table='
			<table>
		  <thead>
          <tr>
            <th>Delicacy</th>
            <th>Restaurant</th>
            <th>Description</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
		';
			}else{
	$table='
	<table>
		<thead>
          <tr>
            <th>Delicacy</th>
            <th>Restaurant</th>
            <th>Description</th>
            <th>Price</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
		'; }

		$sql = "SELECT * FROM items WHERE preference='1' ";
    $result = $Database->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

			$sqlRestaurantInfo = "SELECT username FROM users WHERE id='".$row["companyId"]."'";
			$resultRestaurantInfo = $Database->query($sqlRestaurantInfo);
			$resultRestaurantInfoRow = $resultRestaurantInfo->fetch_assoc();

			$orderButton='';
			if(isset($_SESSION['username'])){
				if($_SESSION['usertype']==='1'){
					$orderButton.='<td><a class="button special small" id="order" data-restaurant="'. $row["companyId"] .'" 
					data-id="'. $row["id"] .'">Order</a></td>';
				}else{
					$orderButton='';
				}
			}else{
				$orderButton.='<td><a href="login.php" class="button special small">Order</a></td>';
			}

			

			$table.='
			<tr>
            <td>'. $row['title'] .'</td>
            <td>'. $resultRestaurantInfoRow['username'] .'</td>
            <td>'. $row['descr'] .'</td>
						<td>'. $row['price'] .'</td>
						'.$orderButton.'
          </tr>
			';
		}
} 
$table.='
</tbody>
</table>
';
	echo $table;	
	}


	function displayNonVegetarianOptions(){

		global $Database;
		if( isset($_SESSION['username'])  && $_SESSION['usertype']==='2'){
			$table='
			<table>
		  <thead>
          <tr>
            <th>Delicacy</th>
            <th>Restaurant</th>
            <th>Description</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
		';
			}else{
	$table='
	<table>
		<thead>
          <tr>
            <th>Delicacy</th>
            <th>Restaurant</th>
            <th>Description</th>
            <th>Price</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
		'; }

		$sql = "SELECT * FROM items WHERE preference!='1' ";
    $result = $Database->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

			$sqlRestaurantInfo = "SELECT username FROM users WHERE id='".$row["companyId"]."'";
			$resultRestaurantInfo = $Database->query($sqlRestaurantInfo);
			$resultRestaurantInfoRow = $resultRestaurantInfo->fetch_assoc();

			$orderButton='';
			if(isset($_SESSION['username'])){
				if($_SESSION['usertype']==='1'){
					$orderButton.='<td><a class="button special small" id="order" data-restaurant="'. $row["companyId"] .'" 
					data-id="'. $row["id"] .'">Order</a></td>';
				}else{
					$orderButton='';
				}
			}else{
				$orderButton.='<td><a href="login.php" class="button special small">Order</a></td>';
			}

			

			$table.='
			<tr>
            <td>'. $row['title'] .'</td>
            <td>'. $resultRestaurantInfoRow['username'] .'</td>
            <td>'. $row['descr'] .'</td>
						<td>'. $row['price'] .'</td>
						'.$orderButton.'
          </tr>
			';
		}
} 
$table.='
</tbody>
</table>
';
	echo $table;	
	}
	
}

