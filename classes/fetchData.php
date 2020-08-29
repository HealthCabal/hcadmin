<?php
class fetchData {
    public function getDataplans($conn, $network) {
        $loadDataPlans = $conn->query("SELECT * FROM airtimedata WHERE network = '$network' AND type='data'"); 
        while($dataPlans = $loadDataPlans->fetch_object()) {
            echo"<option value=".$dataPlans->id.">".$dataPlans->value." for N".number_format($dataPlans->cost)."</option>";
        }

     }


     public function getTVPlans($conn, $network) {
         $loadTVPlans = $conn->query("SELECT * FROM cabletv WHERE network = '$network'");
         while($tvPlans = $loadTVPlans->fetch_object()) {
             echo "<option value='".$tvPlans->id."'>".$tvPlans->plan." for N".number_format($tvPlans->cost)."</option>";
         }
     }

     public function fetchWallet($conn, $userid) {
         $getWallet = $conn->query("SELECT wallet FROM users WHERE id = '$userid'");
         $walletInfo = $getWallet->fetch_object();
         $walletAmount = $walletInfo->wallet;
         //echo "N ".number_format($walletAmount);
         return $walletAmount;
     }

     function fetchTransactions($conn,$userid) {
         $getTrnxns = $conn->query("SELECT * FROM transactions WHERE userid = '$userid' ORDER BY dateandtime DESC");
         while($transactions = $getTrnxns->fetch_object()) {
             print '
             <tr>
             <td>'.$transactions->ref.'</td>
             <td>'.number_format($transactions->amount).'</td>
             <td>'.$transactions->item.' ** '.$transactions->network.'</td>
             <td>'.$transactions->method.'</td>
             <td>'.$transactions->dateandtime.'</td>
           </tr>';
         }
     }

     public function getCardBrands($conn, $network) {
        $loadTVPlans = $conn->query("SELECT * FROM examcheckers WHERE network = '$network'");
        while($tvPlans = $loadTVPlans->fetch_object()) {
            echo "<option value='".$tvPlans->id."'>".$tvPlans->plan." for N".number_format($tvPlans->cost)."</option>";
        }
    }

    public function fetchPoints($conn, $userid) {
        $loadPoints = $conn->query("SELECT points FROM users WHERE id='$userid'");
        $pointData = $loadPoints->fetch_object();
        return $pointData->points;
    }

    public function fetchPointsValue($conn, $userid) {
        $loadPoints = $conn->query("SELECT points FROM users WHERE id='$userid'");
        $pointData = $loadPoints->fetch_object();
        return $pointData->points * 5;
    }
}
$dataPlan = new fetchData();



?>