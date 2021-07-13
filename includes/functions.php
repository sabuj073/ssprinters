<?php 
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

function slug($text)
{
	$text = strtolower($text);
	$slug = preg_replace('#[ -]+#', '-', $text);
	$slug = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);
	return $slug;
}

function getlogo(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `logo`");
	$query = mysqli_fetch_assoc($query);
	return $query;
}

function getlogo_admin(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `logo`");
	return $query;
}

function getinfo(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `info`");
	$query = mysqli_fetch_assoc($query);
	return $query;
}

function getmainabanner(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `main_banner`");
	return $query;
}

function getteam(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `team`");
	return $query;
}

function getpartner(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `brands`");
	return $query;
}

function getproduct(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `products`");
	return $query;
}

function getproductby_cat($cat_id){
	global $con;
	$query = mysqli_query($con,"SELECT * from products,teacher WHERE products.teacher_id = teacher.teacher_id and cat_id='$cat_id'");
	return $query;
}

function getproductby_sub_cat($sql){
	global $con;
	$query = mysqli_query($con,$sql);
	return $query;
}

function getcount($cat_id){
	global $con;
	$query = mysqli_query($con,"SELECT count(*) count from products where cat_id = '$cat_id'");
	$query = mysqli_fetch_assoc($query);
	return $query['count'];
}

function getcount_teacher($cat_id){
	global $con;
	$query = mysqli_query($con,"SELECT count(*) count from products where teacher_id = '$cat_id'");
	$query = mysqli_fetch_assoc($query);
	return $query['count'];
}

function getcount_sub($cat_id){
	global $con;
	$query = mysqli_query($con,"SELECT count(*) count from products where sub_cat_id = '$cat_id'");
	$query = mysqli_fetch_assoc($query);
	return $query['count'];
}

function getcount_search($cat_slug){
	global $con;
	$query = mysqli_query($con,"SELECT * from products,teacher WHERE products.teacher_id = teacher.teacher_id and products.name LIKE '%$cat_slug%' UNION SELECT * from products,teacher WHERE products.teacher_id = teacher.teacher_id and teacher.teacher_name LIKE '%$cat_slug%'");
	$query = mysqli_affected_rows($con);
	return $query;
}

function getproductDetails($id){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `product_details` where product_id = '$id' order by details_id asc");
	return $query;
}

function getproductSpecification(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `product_details` order by product_id asc");
	return $query;
}

function getproductname($id){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `products` where product_id = '$id'");
	$query = mysqli_fetch_assoc($query);
	return $query['product_title'];
}

function getcertificates(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `certificates`");
	return $query;
}

function gerproductcount(){
	global $con;
	$query = mysqli_query($con,"SELECT count(*) as count  FROM `products`");
	$query = mysqli_fetch_assoc($query);
	return $query['count'];

}

function getsolutions(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `solutions`");
	return $query;
}

function catname_by_slug($slug){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `categories` where cat_slug = '$slug'");
	return $query;
}

function catname_by_id($slug){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `categories` where cat_id = '$slug'");
	return $query;
}

function sub_catname_by_slug($slug){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `sub_category` where sub_cat_slug = '$slug'");
	return $query;
}

function getnews(){
	global $con;
	$query = mysqli_query($con,"SELECT *,DATE_FORMAT(date,'%M %d, %Y') as date_format FROM news`");
	return $query;
}

function dologin($post){
	global $con;
	$email = $post['email'];
	$password = sha1($post['password']);
	$pin = $post['pin'];

	$query = mysqli_query($con,"SELECT * from admin_info where admin_email = '$email' and admin_password = '$password' and pin='$pin' ");
	if(mysqli_affected_rows($con)>0){
		$result = mysqli_fetch_assoc($query);

		$_SESSION['paper_admin_id'] = $result['admin_id'];
		$_SESSION['paper_admin_name'] = $result['admin_name'];
		$_SESSION['paper_admin_type'] = $result['TYPE'];

		if(isset($post['rememberme'])){
			setcookie("paper_admin_id", $result['admin_id'], time() + 
				(10 * 365 * 24 * 60 * 60));
			setcookie("paper_admin_name", $result['admin_name'], time() + 
				(10 * 365 * 24 * 60 * 60));
			setcookie("paper_admin_type", $result['TYPE'], time() + 
				(10 * 365 * 24 * 60 * 60));
		}
		return "login";

	}else{
		return "false";
	}

}

function checklogin(){
	if(isset($_COOKIE['paper_admin_id'])){
		$_SESSION['paper_admin_id']    =$_COOKIE['paper_admin_id'];
		$_SESSION['paper_admin_name']  =$_COOKIE['paper_admin_name'];
		$_SESSION['paper_admin_type']  =$_COOKIE['paper_admin_type'];
	}
}

function getadmin(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `admin_info`");
	return $query;
}

function getadmininfo($id){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `admin_info` where admin_id = '$id'");
	return mysqli_fetch_assoc($query);
}

function deleteadmin($id){
	global $con;
	$query = mysqli_query($con,"DELETE FROM `admin_info` where admin_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}

function dosignup($post){
	global $con;
	$name = $post['name'];
	$email = $post['email'];
	$designation = $post['designation'];
	$pin = $post['pin'];
	$password = sha1($post['password']);
	date_default_timezone_set("Asia/Dhaka");
	$date = date('Y-m-d');

	if(checkmail($email)>0){
		return "exists";
	}else{
		$query = mysqli_query($con,"INSERT into admin_info(admin_name,admin_email,admin_password,TYPE,pin,create_date) values('$name','$email','$password','$designation','$pin','$date')");
		if($query){
			return true;
		}else{
			return false;
		}
	}
}

function updateadmin($post,$id){
	global $con;
	$name = $post['name'];
	$email = $post['email'];
	$designation = $post['designation'];
	$pin = $post['pin'];
	$password = sha1($post['password']);
	date_default_timezone_set("Asia/Dhaka");
	$date = date('Y-m-d');
	$query = mysqli_query($con,"UPDATE admin_info set admin_name = '$name',admin_password = '$password',TYPE = '$designation',pin = '$pin' where admin_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}

function checkmail($email){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `admin_info` where admin_email='$email'");
	return mysqli_affected_rows($con);
}

function insertbanner($post,$img){
	global $con;
	$title = $post['title'];
	$description = $post['description'];
	$alt = $post['alt'];
	$query = mysqli_query($con,"INSERT INTO main_banner(banner1,banner_alt,banner_title,banner_desc) values('$img','$alt','$title','$description')");
	return $query;
}

function insertmeta($post){
	global $con;
	$title = mysqli_real_escape_string($con,$post['title']);
	$description = mysqli_real_escape_string($con,$post['description']);
	$meta_id = $post['meta_id'];
	$query = mysqli_query($con,"INSERT INTO metatag(meta_id,title,description) values('$meta_id','$title','$description')");
	return $query;
}

function getallmeta(){
	global $con;
	$query = mysqli_query($con,"SELECT * from metatag order by id desc");
	return $query;
}

function insertlogo($post,$img){
	global $con;
	$alt = $post['alt'];
	$query = mysqli_query($con,"INSERT INTO logo(logo_alt,logo_img) values('$alt','$img')");
	return $query;
}

function insertcategory($post,$img,$icon){
	global $con;
	$title = mysqli_real_escape_string($con,$post['title']);
	$alt = mysqli_real_escape_string($con,$post['alt']);
	$slug = slug($title);
	$query = mysqli_query($con,"INSERT INTO categories(cat_name,cat_img,cat_img_alt,icon,cat_slug) values('$title','$img','$alt','$icon','$slug')");
	return $query;
}

function insertsubcategory($post){
	global $con;
	$title = mysqli_real_escape_string($con,$post['title']);
	$alt = mysqli_real_escape_string($con,$post['alt']);
	$slug = slug($alt);
	$query = mysqli_query($con,"INSERT INTO sub_category(cat_id,sub_cat_name,sub_cat_slug) values('$title','$alt','$slug')");
	return $query;
}

function updatecategory($img,$icon,$id){
	global $con;
	$query = mysqli_query($con,"UPDATE categories set cat_img = '$img',icon='$icon' where cat_id='$id'");
	return "UPDATE categories set cat_img = '$img',icon='$icon' where cat_id='$id'";
}

function insertpartner($post,$img){
	global $con;
	$alt =   mysqli_real_escape_string($con,$post['alt']);
	$email = mysqli_real_escape_string($con,$post['email']);
	$query = mysqli_query($con,"INSERT INTO brands(img,alt,href) values('$img','$alt','$email')");
	return $query;
}

function insertproduct($post){
	global $con;
	$title = mysqli_real_escape_string($con,$post['title']);
	$description = mysqli_real_escape_string($con,$post['description']);
	$query = mysqli_query($con,"INSERT INTO products(product_title,product_desc) values('$title','$description')");
	return $query;
}

function insertproductdetails($post){
	global $con;
	$title = mysqli_real_escape_string($con,$post['title']);
	$description = mysqli_real_escape_string($con,$post['description']);
	$product = $post['product'];
	$query = mysqli_query($con,"INSERT INTO product_details(product_id,item,specification) values('$product','$title','$description')");
	return $query;
}

function insertcertificate($post,$img){
	global $con;
	$alt = mysqli_real_escape_string($con,$post['alt']);
	$query = mysqli_query($con,"INSERT INTO certificates(image,alt) values('$img','$alt')");
	return $query;
}
function insertvideo($post){
	global $con;
	$title = mysqli_real_escape_string($con,$post['title']);
	$description = mysqli_real_escape_string($con,$post['description']);
	$ylink = $post['ylink'];
	promo_video();
	if(mysqli_affected_rows($con)>0){
		$query = mysqli_query($con,"UPDATE promo_video set title = '$title',description = '$description',ylink = '$ylink'");
	}else{
		$query = mysqli_query($con,"INSERT INTO promo_video(title,description,ylink) values('$title','$description','$ylink')");
	}
	
	return $query;
}

function insertnews($post,$img){
	global $con;
	$alt = mysqli_real_escape_string($con,$post['alt']);
	$title = mysqli_real_escape_string($con,$post['title']);
	$description = mysqli_real_escape_string($con,$post['description']);
	$date = $post['date'];
	$link = $post['link'];
	$query = mysqli_query($con,"INSERT INTO news(image,alt,title,description,date,href) values('$img','$alt','$title','$description','$date','$link')");
	return $query;
}

function insertteacher($post,$img){
	global $con;
	$alt = mysqli_real_escape_string($con,$post['alt']);
	$name = mysqli_real_escape_string($con,$post['name']);
	$designation = mysqli_real_escape_string($con,$post['designation']);
	$fb = $post['fb'];
	$linkedin = $post['linkedin'];
	$youtube = $post['youtube'];
	$twitter = $post['twitter'];
	$ts = $post['ts'];
	$slug = slug($post['name']);
	$query = mysqli_query($con,"INSERT INTO teacher(teacher_name,designation,teacher_image,teacher_alt,fb,ln,twiter,youtube,teacher_say,teacher_slug) values('$name','$designation','$img','$alt',
		'$fb','$ln','$twitter','$youtube','$ts','$slug')");
	return $query;
}

function insertcourse($post,$img){
	global $con;
	$alt = mysqli_real_escape_string($con,$post['alt']);
	$cat = $_POST['cat'];
	$sub_cat = $_POST['sub_cat'];
	$name = mysqli_real_escape_string($con,$post['name']);
	$price = $post['price'];
	$description = mysqli_real_escape_string($con,$post['description']);
	$teacher = $post['teacher'];
	$details = $post['details'];
	$topics = $post['topics'];
	$learn = $post['learn'];
	$slug = slug($post['name']);
	$language = mysqli_real_escape_string($con,$post['language']);
	$link = $post['link'];
	$query = mysqli_query($con,"INSERT INTO products(product_image,product_alt,cat_id,sub_cat_id,name,teacher_id,price,description,details,topics,what_you_learn,product_slug,language,course_link) values('$img','$alt','$cat','$sub_cat',
		'$name','$teacher','$price','$description','$details','$topics','$learn','$slug','$language','$link')");
	return $query;
}

function updatecourse($post,$id){
	global $con;
	$alt = mysqli_real_escape_string($con,$post['alt']);
	$cat = $_POST['cat'];
	$sub_cat = $_POST['sub_cat'];
	$name = mysqli_real_escape_string($con,$post['name']);
	$price = $post['price'];
	$description = mysqli_real_escape_string($con,$post['description']);
	$teacher = $post['teacher'];
	$details = $post['details'];
	$topics = $post['topics'];
	$learn = $post['learn'];
	$language = mysqli_real_escape_string($con,$post['language']);
	$link = $post['link'];
	$url = $post['url'];
	$query = mysqli_query($con,"UPDATE products set product_alt = '$alt',cat_id = '$cat',sub_cat_id = '$sub_cat',name='$name',teacher_id = '$teacher',price = '$price',description = '$description',details = '$details',topics = '$topics',what_you_learn = '$learn',product_slug = '$url',language = '$language',course_link = '$link' where product_id = '$id'");
	return $query;
}

function update_ceo($img){
	global $con;
	mysqli_query($con,"SELECT * from info");
	if(mysqli_affected_rows($con)>0){
		mysqli_query($con,"UPDATE info set ceo_image = '$img'");
	}else{
		mysqli_query($con,"INSERT INTO  info(ceo_image) values('$img')");
	}
}

function get_categories(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `categories`");
	return $query;
}

function get_sub_categories(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `sub_category`,categories WHERE categories.cat_id = sub_category.cat_id");
	return $query;
}



function sub_categories($cat_id){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `sub_category` where cat_id = '$cat_id'");
	return $query;
}

function course_count($cat_id){
	global $con;
	$query = mysqli_query($con,"SELECT count(*) count from products where cat_id = '$cat_id'");
	$query = mysqli_fetch_assoc($query);
	return $query['count'];
}

function get_setup($title){
	global $con;
	$query = mysqli_query($con,"SELECT * from setup where setup_name = '$title'");
	$query = mysqli_fetch_assoc($query);
	return $query;
}

function getprintingdetails(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `printing_details`");
	return $query;
}

function getgsmdetails(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `gsm`");
	return $query;
}

function insert_gsm_details($post){
	$color = $post['gsm'];
	$price = $post['price'];
	global $con;
	$query = mysqli_query($con,"INSERT INTO `gsm`(gsm) VALUES('$color')");
	if($query){
		return true;
	}else{
		return false;
	}
}

//Paper Price
function getpaperdetails(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `paper_price`");
	return $query;
}

function getpaperdetailsby_id($id){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `paper_price` where paper_id = '$id'");
	return mysqli_fetch_assoc($query);
}

function deletepaperdetails($id){
	global $con;
	$query = mysqli_query($con,"DELETE  FROM `paper_price` where paper_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}
function insert_paper_details($post){
	$color = $post['color'];
	$price = $post['price'];
	$qty = $post['qty'];
	global $con;
	$query = mysqli_query($con,"INSERT INTO `paper_price`(name,price,qty) VALUES('$color','$price','$qty')");
	if($query){
		return true;
	}else{
		return false;
	}
}

function update_paper_details($post){
	$color = $post['color1'];
	$price = $post['price1'];
	$qty = $post['qty'];
	$id = $post['id'];
	global $con;
	$query = mysqli_query($con,"UPDATE `paper_price`set name='$color',price='$price',qty = '$qty' where paper_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}
//Paper PRice



function deletegsmdetails($id){
	global $con;
	$query = mysqli_query($con,"DELETE  FROM `gsm` where gsm_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}

function deleteprintingdetails($id){
	global $con;
	$query = mysqli_query($con,"DELETE  FROM `printing_details` where printing_details_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}
function insert_printing_details($post){
	$color = $post['color'];
	$price = $post['price'];
	global $con;
	$query = mysqli_query($con,"INSERT INTO `printing_details`(color,price) VALUES('$color','$price')");
	if($query){
		return true;
	}else{
		return false;
	}
}

function update_printing_details($post){
	$color = $post['color1'];
	$price = $post['price1'];
	$id = $post['id'];
	global $con;
	$query = mysqli_query($con,"UPDATE `printing_details`set color='$color',price='$price' where printing_details_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}

function update_gsm_details($post){
	$color = $post['color1'];
	$price = $post['price1'];
	$id = $post['id'];
	global $con;
	$query = mysqli_query($con,"UPDATE `gsm`set gsm='$color' where gsm_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}

function getlaminationdetails(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `lamination_details`");
	return $query;
}

function deletelaminationdetails($id){
	global $con;
	$query = mysqli_query($con,"DELETE  FROM `lamination_details` where lamination_details_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}
function insert_lamination_details($post){
	$color = $post['color'];
	$price = $post['price'];
	global $con;
	$query = mysqli_query($con,"INSERT INTO `lamination_details`(lam_type,lam_price) VALUES('$color','$price')");
	if($query){
		return true;
	}else{
		return false;
	}
}

function update_lamination_details($post){
	$color = $post['color1'];
	$price = $post['price1'];
	$id = $post['id'];
	global $con;
	$query = mysqli_query($con,"UPDATE `lamination_details`set lam_type='$color',lam_price='$price' where lamination_details_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}

function getcuttingdetails(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `cutting_details`");
	return $query;
}

function deletecuttingdetails($id){
	global $con;
	$query = mysqli_query($con,"DELETE  FROM `cutting_details` where cutting_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}
function insert_cutting_details($post){
	$color = $post['color'];
	$price = $post['price'];
	global $con;
	$query = mysqli_query($con,"INSERT INTO `cutting_details`(cut_type,cut_price) VALUES('$color','$price')");
	if($query){
		return true;
	}else{
		return false;
	}
}

function update_cutting_details($post){
	$color = $post['color1'];
	$price = $post['price1'];
	$id = $post['id'];
	global $con;
	$query = mysqli_query($con,"UPDATE `cutting_details`set cut_type='$color',cut_price='$price' where cutting_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}

function getmakingdetails(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `making_details`");
	return $query;
}

function deletemakingdetails($id){
	global $con;
	$query = mysqli_query($con,"DELETE  FROM `making_details` where making_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}
function insert_making_details($post){
	$color = $post['color'];
	$price = $post['price'];
	global $con;
	$query = mysqli_query($con,"INSERT INTO `making_details`(making_type,making_price) VALUES('$color','$price')");
	if($query){
		return true;
	}else{
		return false;
	}
}

function update_making_details($post){
	$color = $post['color1'];
	$price = $post['price1'];
	$id = $post['id'];
	global $con;
	$query = mysqli_query($con,"UPDATE `making_details`set making_type='$color',making_price='$price' where making_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}

function getfoildetails(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `foil_details`");
	return $query;
}

function deletefoildetails($id){
	global $con;
	$query = mysqli_query($con,"DELETE  FROM `foil_details` where foid_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}
function insert_foil_details($post){
	$color = $post['color'];
	$price = $post['price'];
	global $con;
	$query = mysqli_query($con,"INSERT INTO `foil_details`(foil_type,foil_price) VALUES('$color','$price')");
	if($query){
		return true;
	}else{
		return false;
	}
}

function update_foil_details($post){
	$color = $post['color1'];
	$price = $post['price1'];
	$id = $post['id'];
	global $con;
	$query = mysqli_query($con,"UPDATE `foil_details`set foil_type='$color',foil_price='$price' where foid_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}

function getdeliverydetails(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `delivery_details`");
	return $query;
}

function deletedeliverydetails($id){
	global $con;
	$query = mysqli_query($con,"DELETE  FROM `delivery_details` where delivery_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}
function insert_delivery_details($post){
	$color = $post['color'];
	$price = $post['price'];
	global $con;
	$query = mysqli_query($con,"INSERT INTO `delivery_details`(delivery_type,delivery_price) VALUES('$color','$price')");
	if($query){
		return true;
	}else{
		return false;
	}
}

function update_delivery_details($post){
	$color = $post['color1'];
	$price = $post['price1'];
	$id = $post['id'];
	global $con;
	$query = mysqli_query($con,"UPDATE `delivery_details`set delivery_type='$color',delivery_price='$price' where delivery_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}


function get_realted_courses($id,$pid){
	global $con;
	$query = mysqli_query($con,"SELECT * from products,teacher WHERE products.teacher_id = teacher.teacher_id and sub_cat_id='$id' and product_id!='$pid' ORDER BY products.product_id DESC limit 10");
	return $query;
}

function get_count(){
	global $con;
	$query = mysqli_query($con,"SELECT
		(SELECT count(*)  from teacher)as teacher,
		(SELECT count(*) from user_info) as student,
		(SELECT count(*) from products) as courses,
		(SELECT count(*) from admin_info) as admmin,
		(SELECT count(*) from categories) as categories,
		(SELECT count(*) from sub_category) as sub_category");
	return $query;
}

function promo_video(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `promo_video`");
	$query = mysqli_fetch_assoc($query);
	return $query;
}

function testimonial(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `testimonial` ORDER BY `testimonial`.`testimonial_id` DESC");
	return $query;
}

function get_teacher(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `teacher` limit 10");
	return $query;
}

function get_teacher_slug($slug){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `teacher` where teacher_slug = '$slug'");
	$query = mysqli_fetch_assoc($query);
	return $query;
}

function get_all_teacher(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `teacher`");
	return $query;
}

function get_choose_us(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `why_choose_us`");
	return $query;
}

function get_course_by_slug($slug){
	global $con;
	$query = mysqli_query($con,"SELECT * from products,categories,sub_category,teacher where products.cat_id = categories.cat_id and products.sub_cat_id = sub_category.sub_cat_id and products.teacher_id = teacher.teacher_id and product_slug = '$slug'");
	$query = mysqli_fetch_assoc($query);
	return $query;
}

function get_course_by_id($id){
	global $con;
	$query = mysqli_query($con,"SELECT * from products,categories,sub_category,teacher where products.cat_id = categories.cat_id and products.sub_cat_id = sub_category.sub_cat_id and products.teacher_id = teacher.teacher_id and product_id = '$id'");
	$query = mysqli_fetch_assoc($query);
	return $query;
}


function cout_course_by_teacher($id){
	global $con;
	$query = mysqli_query($con,"SELECT count(*) count from products where teacher_id = '$id'");
	$query = mysqli_fetch_assoc($query);
	return $query['count'];
}

function checkuser_mail($email){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `user_info` where email='$email'");
	return mysqli_affected_rows($con);
}

function register_user($post){
	global $con;
	$name = $post['name'];
	$number = $post['number'];
	$email = $post['email'];
	$password = md5($post['pass']);
	$query = mysqli_query($con,"INSERT INTO user_info(name,email,password,mobile) values ('$name','$email','$password','$number')");
	return $query;
}

function login($post){
	global $con;
	$email = $post['login_email'];
	$pass = md5($post['password']);

	$query = mysqli_query($con,"SELECT * from user_info where email='$email' and password = '$pass'");
	if(mysqli_affected_rows($con)==0){
		return 'false';
	}else{
		$query = mysqli_fetch_assoc($query);
		$_SESSION['paper_uid'] = $query['user_id'];
		$_SESSION['paper_uname'] = $query['name'];
		$_SESSION['paper_uemail'] = $query['email'];
		$_SESSION['paper_uphone'] = $query['mobile'];

		if(isset($post['rememberme'])){
			setcookie("paper_uid", $query['user_id'], time() + 
				(10 * 365 * 24 * 60 * 60));
			setcookie("paper_uname", $query['name'], time() + 
				(10 * 365 * 24 * 60 * 60));
			setcookie("paper_uemail", $query['email'], time() + 
				(10 * 365 * 24 * 60 * 60));
			setcookie("paper_uphone", $query['mobile'], time() + 
				(10 * 365 * 24 * 60 * 60));
		}
	}
}



function getmission(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `vision_and_story`");
	return $query;
}

function deleteteacher($id){
	global $con;
	$query = mysqli_query($con,"DELETE  FROM teacher where teacher_id = '$id'");
	return $query;
}

function deletecourse($id){
	global $con;
	$query = mysqli_query($con,"DELETE  FROM products where product_id = '$id'");
	return $query;
}

function add_to_course($course_id){
	global $con;
	$uid = $_SESSION['paper_uid'];
	$date = date("Y-m-d");
	$query = mysqli_query($con,"INSERT INTO orders(student_id,course_id,date) values('$uid','$course_id','$date')");
	return $query;
}

function check_if_requested($course_id){
	global $con;
	if(isset($_SESSION['paper_uid'])){
		$uid = $_SESSION['paper_uid'];
		$query = mysqli_query($con,"SELECT * FROM orders WHERE student_id = '$uid' and course_id = '$course_id' and status='0'");
		if(mysqli_affected_rows($con)>0){
			return 1;
		}else{
			return 0;
		}
	}else{
		return 0;
	}
}

function check_if_taken($course_id){
	global $con;
	if(isset($_SESSION['paper_uid'])){
		$uid = $_SESSION['paper_uid'];
		$query = mysqli_query($con,"SELECT * FROM orders WHERE student_id = '$uid' and course_id = '$course_id' and status='1'");
		if(mysqli_affected_rows($con)>0){
			return 1;
		}else{
			return 0;
		}
	}else{
		return 0;
	}
}

function send_mail_alert(){
	$data = getadmin();
	$data = mysqli_fetch_assoc($data);
	while($row = mysqli_fetch_assoc($data)){
		$email = $row['admin_email'];
		$msg = "New Enrollment request.\nPlease check your admin panel.\nEmpyrean";
		$msg = wordwrap($msg,70);
		mail($email,"New Enrollment Request",$msg);
	}
}
function getcustomerinfo($id){
	global $con;
	$data = mysqli_query($con,"SELECT * from user_info where user_id = '$id'");
	return $data;
}

function checkuser($sql){
	global $con;
	$data = mysqli_query($con,$sql);
	return $data;
}

function getordersbyid($sql){
	global $con;
	$data = mysqli_query($con,$sql);
	return $data;
}

function getcount_order($id){
	global $con;
	$data = mysqli_query($con,"SELECT count(*) as count from orders where student_id = '$id'");
	$data = mysqli_fetch_assoc($data);
	return $data['count'];
}

function check_email($email){
	global $con;
	$data = mysqli_query($con,"SELECT * from user_info where email = '$email'");
	return mysqli_affected_rows($con);
}

function resetpass($email,$pass){
	global $con;
	$pass = md5($pass);
	$data = mysqli_query($con,"UPDATE user_info set password = '$pass' where email = '$email'");
	return $data;;
}

function sendquery($post){
	$name = $post['name'];
	$email = $post['email'];
	$subject = $post['subject'];
	$message = $post['message'];
	global $con;
	$sql = "INSERT INTO new_query(name,email,subject,msg) values ('$name','$email','$subject','$message')";
	$data = mysqli_query($con,$sql);
	return $data;
}


function subscribe($email){
	global $con;
	$sql = "INSERT INTO newsletter(email) values ('$email')";
	$data = mysqli_query($con,$sql);
	return $data;

}

function get_course_list(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM products,categories,sub_category,teacher WHERE products.cat_id = categories.cat_id and products.sub_cat_id = sub_category.sub_cat_id and products.teacher_id = teacher.teacher_id ORDER by products.cat_id ASC");
	return $query;
}

function updatecourse_img($img,$id){
	global $con;
	$query = mysqli_query($con,"UPDATE products set product_image = '$img' where product_id = '$id'");
	return $query;
}

function get_pending_courses(){
	global $con;
	$query = mysqli_query($con,"SELECT *,user_info.name as student_name FROM orders,user_info,products WHERE orders.student_id = user_info.user_id and orders.course_id = products.product_id and orders.status = '0' ORDER by orders.order_id DESC");
	return $query;
}

function get_all(){
	global $con;
	$query = mysqli_query($con,"SELECT *,user_info.name as student_name FROM orders,user_info,products WHERE orders.student_id = user_info.user_id and orders.course_id = products.product_id ORDER by orders.order_id DESC");
	return $query;
}

function get_approved_courses(){
	global $con;
	$query = mysqli_query($con,"SELECT *,user_info.name as student_name FROM orders,user_info,products WHERE orders.student_id = user_info.user_id and orders.course_id = products.product_id and orders.status = '1' ORDER by orders.order_id DESC");
	return $query;
}

function approvecourse($id){
	global $con;
	$query = mysqli_query($con,"UPDATE orders set status = '1' where order_id = '$id'");
	return $query;
}

function unapprovecourse($id){
	global $con;
	$query = mysqli_query($con,"UPDATE orders set status = '0' where order_id = '$id'");
	return $query;
}

function deletecourse_($id){
	global $con;
	$query = mysqli_query($con,"DELETE from orders where order_id = '$id'");
	return $query;
}

function countpending(){
	global $con;
	$query = mysqli_query($con,"SELECT count(*) count from orders where status = '0'");
	$data = mysqli_fetch_assoc($query);
	return $data['count'];
}

function countapproved(){
	global $con;
	$query = mysqli_query($con,"SELECT count(*) count from orders where status = '1'");
	$data = mysqli_fetch_assoc($query);
	return $data['count'];
}

function countall(){
	global $con;
	$query = mysqli_query($con,"SELECT count(*) count from orders");
	$data = mysqli_fetch_assoc($query);
	return $data['count'];
}

function updatesetup($sql){
	global $con;
	$query = mysqli_query($con,$sql);
	return $query;

}

function getpagename($id){
	global $con;
	if($id!="home" && $id!="vision" && $id!="contact" && $id!="teacher"){
		$data = explode("_",$id);
		if($data[0]=='c'){
			$c_id = $data[1];
			$sql = "SELECT name as name from products where product_id = '$c_id'";
		}elseif($data[0]=='t'){
			$c_id = $data[1];
			$sql = "SELECT teacher_name as name from teacher where teacher_id = '$c_id'";
		}elseif($data[0]=='cat'){
			$c_id = $data[1];
			$sql = "SELECT cat_name as name from categories where cat_id = '$c_id'";
		}elseif($data[0]=='subcat'){
			$c_id = $data[1];
			$sql = "SELECT sub_cat_name as name from sub_category where sub_cat_id = '$c_id'";
		}
		$query = mysqli_query($con,$sql);
		$query = mysqli_fetch_assoc($query);
		return $query['name'];
	}else{
		return $id;
	}
	
}
function getmetatag($meta_id){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM metatag where meta_id = '$meta_id'");
	if(mysqli_affected_rows($con)==0){
		$query = mysqli_query($con,"SELECT * FROM metatag where meta_id = 'home'");
	}
	return $query;
}

function getqueries(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `new_query` order by query_id desc");
	return $query;
}

function getsubscribers(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `newsletter` order by news_id desc");
	return $query;
}

function makeinvoice($post){
	global $con;
	$name = mysqli_real_escape_string($con,$post['name']);
	$number = $post['number'];
	$address = $post['address'];
	$paid = $post['paid'];

	$dc = $_SESSION['dc'];
	$profit = $_SESSION['profit'];
	$discount =  $_SESSION['discount'];
	date_default_timezone_set("Asia/Dhaka");
	$date = date('Y-m-d');

	$total = 0;
	foreach($_SESSION['paper_cart'] as $product){
		$temptotal = 0;
		$temptotal = $product['price']*$product['qty'];
		$total +=$temptotal;
	}
	$withprofit = ($total*$profit)/100;
	$total += $dc+$withprofit;
	$total -= $discount;
	$prod_count = count($_SESSION['paper_cart']);
	mysqli_query($con,"INSERT INTO orders(name,number,address,prod_count,profit,discount,total,paid,delivery_charge,date) values('$name','$number','$address','$prod_count','$withprofit','$discount','$total','$paid','$dc','$date')");
	$id = mysqli_insert_id($con);
	foreach($_SESSION['paper_cart'] as $product){
		$withprofit = 0;
		$title = $product['title'];
		$qty = $product['qty'];
		$price = $product['price'];
		$withprofit = ($price*$profit)/100;
		$price += $withprofit;
		mysqli_query($con,"INSERT INTO order_details(order_id,prod_title,qty,price) values('$id','$title','$qty','$price')");
	}
	return $id;;
}

function getordersdetailsbyid($id){
	global $con;
	$query = mysqli_query($con,"SELECT * from orders,order_details where orders.order_id = order_details.order_id and orders.order_id='$id'");
	return $query;
}



function getallorders(){
	global $con;
	$query = mysqli_query($con,"SELECT * from orders order by orders.order_id desc");
	return $query;
}

function getdueorders(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `orders` WHERE total-paid > 0 order by orders.order_id desc");
	return $query;
}

function updatedue($post){
	global $con;
	$id = $post['id'];
	$pay = $post['pay'];
	$query = mysqli_query($con,"UPDATE orders set paid = paid+'$pay' Where order_id = '$id'");
	if($query){
		return true;
	}else{
		return false;
	}
}

function update_info($post,$img){
	global $con;
	$cname = mysqli_real_escape_string($con,$post['cname']);
	$phone = $post['phone'];
	$address = $post['address'];

	mysqli_query($con,"SELECT * from info");
	if(mysqli_affected_rows($con)>0){
		$query = mysqli_query($con,"UPDATE info set phone = '$phone',address='$address',shop_name = '$cname'");
	}else{
		$query = mysqli_query($con,"INSERT INTO  info(phone,address,shop_name) values('$phone','$address','$cname')");
	}

	if($query){
		if($img!=""){
			$query = mysqli_query($con,"UPDATE info set logo = '$img'");
		}
		if($query){
			return true;
		}else{
			return false;
		}
	}else{
		$query = mysqli_query($con,"UPDATE logo set logo_alt = '$alt'");
	}
}

function earning(){
	global $con;
	$query = mysqli_query($con,"SELECT sum(total) earning
		FROM orders
		WHERE MONTH(date) = MONTH(CURRENT_DATE())
		AND YEAR(date) = YEAR(CURRENT_DATE())");
	$query = mysqli_fetch_assoc($query);
	return $query['earning'];
}

function transections(){
	global $con;
	$query = mysqli_query($con,"SELECT count(*) earning
		FROM orders
		WHERE MONTH(date) = MONTH(CURRENT_DATE())
		AND YEAR(date) = YEAR(CURRENT_DATE())");
	$query = mysqli_fetch_assoc($query);
	return $query['earning'];
}

function profit(){
	global $con;
	$query = mysqli_query($con,"SELECT sum(profit) earning
		FROM orders
		WHERE MONTH(date) = MONTH(CURRENT_DATE())
		AND YEAR(date) = YEAR(CURRENT_DATE())");
	$query = mysqli_fetch_assoc($query);
	return $query['earning'];
}

function due(){
	global $con;
	$query = mysqli_query($con,"SELECT count(*) earning FROM `orders` WHERE total-paid > 0");
	$query = mysqli_fetch_assoc($query);
	return $query['earning'];
}

function getcustomer(){
    global $con;
    $query = mysqli_query($con,"SELECT DISTINCT(number),name,address FROM orders");
    return $query;
}

function getPoprovider(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `po_provider`");
	return $query;
}

function insert_po_provider($post){
	global $con;
	$name = mysqli_real_escape_string($con,$post['name']);
	$query = mysqli_query($con,"INSERT INTO `po_provider` (`po_provider_id`, `provier_name`) VALUES (NULL, '$name')");
	return $query;
}

function update_po_provider_details($post){
	global $con;
	$name = mysqli_real_escape_string($con,$post['name1']);
	$id = $post['id'];
	$query = mysqli_query($con,"UPDATE po_provider set provier_name='$name' where po_provider_id='$id'");
	return $query;
}

function delete_po_provider($id){
	global $con;
	$query = mysqli_query($con,"DELETE from po_provider where po_provider_id='$id'");
	return $query;
}

function getRawData(){
	global $con;
	$query = mysqli_query($con,"SELECT * FROM `new_data`,po_provider WHERE new_data.po_provider = po_provider.po_provider_id");
	return $query;
}


function getdatadetails($id){
	global $con;
	$query = mysqli_query($con,"SELECT * from new_data where new_data_id='$id'");
	return mysqli_fetch_assoc($query);
}

function getmasterdata(){
	global $con;
	$query = mysqli_query($con,"SELECT * from new_data GROUP BY pi_number");
	return $query;
}

function update_received_lc($id,$lc){
	global $con;
	$query = mysqli_query($con,"UPDATE new_data set pi_number='$lc' where new_data_id='$id'");
	return $query;
}

function getdataamount(){
	global $con;
	$query = mysqli_query($con,"SELECT sum(bill_qty*po_unit_price) as total, sum(po_costing*bill_qty) as costing, sum(profit) as profit FROM new_data");
	return mysqli_fetch_assoc($query);
}

function getCommercialInvoice($pi){
	global $con;
	$query = mysqli_query($con,"SELECT *,DATE_FORMAT(date,'%d-%M-%Y') format_date FROM `new_data` WHERE pi_number = '$pi'");
	return $query;
}



?>

