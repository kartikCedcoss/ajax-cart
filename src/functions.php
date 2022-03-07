<?php
session_start();
include('config.php');
if(!isset($_SESSION['add'])){
    $_SESSION['add'] = array();
}
?>


<?php
 
if(isset($_POST)){
    $id= $_POST['id'];
    $name= $_POST['name'];
    $image= $_POST['image'];
    $price= $_POST['price'];
    $action= $_POST['action'];

switch($action){
    case 'add':
    {
        
      addTocart($id,$name,$image,$price);
    }
    break;
    
    


}

} 
function addTocart($id,$name,$image,$price)
{   
    if(!isset($_SESSION['add'])){
        $_SESSION['add'] = array();
    }
  $nid = $id;
  $nname = $name;
  $nimage = $image;
  $nprice = $price;



  $data = array("id" => $nid ,"name"=> $nname , "image"=> $nimage ,"price" => $nprice, "quantity" => "1");
  array_push($_SESSION['add'], $data);
  echo "<table><tr><th>ID</th><th>Product</th><th>Price</th><th>Quantity</th></tr>";
  foreach($_SESSION['add'] as $key => $val) {
        echo "<tr><td>".$val['id']."</td><td><img src='images/'".$val['image']."'</td><td>".$val['price']."</td><td><button>-</button>".$val['quantity']."<button>+</button></td>
        <td></td><td><input type='submit' name='del' value='Delete'></td>";
        
  }
  echo '</table>';
 print_r($_SESSION['add']);
}

  
?>




