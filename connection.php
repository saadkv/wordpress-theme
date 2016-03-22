<?php 

session_start();
class database{
	
	public $con;
	
	function __construct(){
		$host='localhost';
		$username='root';
		$password='';
		$dbname='15-march-2016';
		$this->con=mysqli_connect($host,$username,$password,$dbname) or die('connection error');
		}
		
	function userlogin($useremail,$userpassword){
		$query="select * from userinformation where user_email = '".$useremail."' and user_password = '".$userpassword."'";
		$result=mysqli_query($this->con,$query);
		return($result);
	}
	function registration($l_name,$gender,$dob,$f_name,$user_email,$user_password){
		$query="insert into userinformation (l_name,gender,dob,f_name,user_email,user_password) 
		values('".$l_name."','".$gender."','".$dob."','".$f_name."','".$user_email."','".$user_password."')";
		$result = mysqli_query($this->con,$query);
		}
	function email_exits($email){
		$query = "SELECT * FROM userinformation WHERE user_email = '".$email."'";
		$result = mysqli_query($this->con,$query);
		return($result);
		}
	function add_product($product_name,$product_price,$product_image,$user_id){
		$query="insert into product (product_name,product_price,product_image,user_id)  values('".$product_name."','".$product_price."','".$product_image."',".$user_id.")";
		$result=mysqli_query($this->con,$query);
		}
	function all_products($user_id){
		$query = "SELECT * FROM userinformation INNER JOIN product ON userinformation.user_id=product.user_id where userinformation.user_id=".$user_id."";
		$result = mysqli_query($this->con,$query);
		return($result);
		}
	function view_product($product_id){
		$query = "SELECT * FROM product WHERE id=".$product_id."";
		$result = mysqli_query($this->con,$query);
		return($result);
		}
	function delete_product($product_id){
		$query = "delete from product where id = ".$product_id."";
		$result = mysqli_query($this->con,$query);
		}
	function edit_product($product_id,$product_name,$product_price,$product_image){
		$query = "UPDATE product SET product_name='".$product_name."', product_price='".$product_price."',product_image='".$product_image."' 
		WHERE id = ".$product_id." ";
		$result = mysqli_query($this->con,$query);
		return($result);
		}
	function all_category(){
		$query = "SELECT category_id, category_name, category_link, parent_id, sort_order FROM `category` ORDER BY parent_id, sort_order, category_name";
		$result = mysqli_query($this->con,$query);
		return($result);
		}
}
$myobj= new database();
//$myobj->add_product('car','2323','image','6');
?>