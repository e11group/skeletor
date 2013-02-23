<?php 
namespace Weather\Skeletor;

class OrderService
{

    public function __construct() 

    {    }

    public function getCustomerOrderHistory($customer_email) 
    {

 $db = new dbConnect();
        $query = "SELECT * FROM Customer WHERE Email = '$customer_email'";

        if ($result = $db->query($query)) {

            while ($row = $result->fetchArray()) {

                $customer_id = $row['CustomerID'];

            }

            unset($result);

            $customer_query = "SELECT * FROM Purchase WHERE CustomerID = '$customer_id' ORDER BY OrderDate DESC";

            if ($result = $db->query($customer_query)) {

                return $result;

            }

            unset($result);


        }

        else {

            return false;
        
        }


    }

     public function getOrders($where = '',$limit = '', $order = 'DESC') 

    {

        $dbname = new dbConnect();
            
            $query = "SELECT * FROM Purchase $where ORDER BY PurchaseID $order $limit";

                if ($result = $dbname->query($query)) {

                    while ($row = $result->fetchArray()) {

                        $customer_id = $row['CustomerID'];

                      }

                
                      return $result;

                        $dbname->close();
                      unset($dbname);

                  }

                  else {

                    return false;
                  }

            

    }

    public function getOrderDetails($order_num) 

    {

        $dbname = new dbConnect();
            
            $query = "SELECT * FROM Purchase WHERE PurchaseID = '$order_num'";

                if ($result = $dbname->query($query)) {

                    return $result;
                    unset($result);
                    $dbname->close();

                }  

            else {

                return false;
                unset($result);
                $dbname->close();

            }
    }

    public function getOrderStatus($order_num)

    {

        $db = new dbConnect();
        $query = "SELECT * FROM OrderStatus WHERE PurchaseID = '$order_num'";

        if ($result = $db->query($query)) {

            return $result;
        
        }

        else {

            return false;
        
        }


    }

     public function getOrderTracking($order_num)

    {

        $db = new dbConnect();
        $query = "SELECT * FROM OrderTracking WHERE PurchaseID = '$order_num'";

        if ($result = $db->query($query)) {

            return $result;
        
        }

        else {

            return false;
        
        }


    }

       public function getOrderQuality($order_num)

    {

        $db = new dbConnect();
        $query = "SELECT * FROM OrderQuality WHERE PurchaseID = '$order_num'";

        if ($result = $db->query($query)) {

            return $result;
        
        }

        else {

            return false;
        
        }


    }

    public function getOrderExport()

    {

        $db = new dbConnect();
        $query = "SELECT * FROM OrderExport";

        if ($result = $db->query($query)) {

            return $result;

            $db->close();
            unset($db);
        
        }

        else {

            return false;
        
        }


    }

     public function getOrderCustomer($order_num)

    {

        $db = new dbConnect();
        $query = "SELECT * FROM Purchase WHERE PurchaseID = '$order_num'";

        if ($result = $db->query($query)) {

            while ($row = $result->fetchArray()) {

                $customer_id = $row['CustomerID'];

            }

            unset($result);

            $customer_query = "SELECT * FROM Customer WHERE CustomerID = '$customer_id'";

            if ($result = $db->query($customer_query)) {

                return $result;

            }

            unset($result);


        }

        else {

            return false;
        
        }


    }

    public function getOrderItem($order_num)

    {

        $db = new dbConnect();
        $query = "SELECT * FROM Purchase WHERE PurchaseID = '$order_num'";

      

            $customer_query = "SELECT * FROM PurchaseItems WHERE PurchaseID = '$order_num'";

            if ($result = $db->query($customer_query)) {

                return $result;

            }
            else {

                return false;

            }

            unset($result);


        

    }

     public function guestLogin($orderno, $zip)
    {
        $dbname = new dbConnect();

        $query = "SELECT * FROM Purchase WHERE OrderNum = '$orderno' AND pcode = '$zip'";

        if ($result = $dbname->query($query)) {

             while ($row = $result->fetchArray()) {

                $user = $row["PurchaseID"];

            }

        }

        if (empty($user)) {
            
            return false;
             $dbname->close();

        } else {

            return $user;

        }

        return false;

        $dbname->close();

    }

   
  

}

?>