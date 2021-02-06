<?php 
	include_once '../lib/Database.php'; 
	include_once '../helpers/Format.php'; 
?>
<?php 
	/**
	 * Brand
	 */
	class Brand{
		
		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function brandInsert($brandName){
			$brandName = $this->fm->validation($brandName);
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);

		if (empty($brandName)) {
			$msg = "<span class='error'>Brand Name must not be empty !</span>";
			return $msg;
		} else {
			$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
			$brandinsert = $this->db->insert($query);

		if ($brandinsert) {
			$msg = "<span class='success'>Brand Name Inserted Successfully.</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>Brand Name not Inserted .</span>";
			return $msg;
			}
		}

	}

	public function getAllBrand() {
		$query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
		$result = $this->db->select($query);
		return $result;
	}

}
?>