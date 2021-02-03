<?php 
	include_once '../lib/Database.php'; 
	include_once '../helpers/Format.php'; 
?>

<?php 
	/**
	 * Category class
	 */
	class Category{
		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
	}

	public function catInsert($catName){
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link, $catName);

		if (empty($catName)) {
			$msg = "<span class='error'>Category must not be empty !</span>";
			return $msg;
	} else {
		$query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
		$catinsert = $this->db->insert($query);

		if ($catinsert) {
			$msg = "<span class='success'>Category Inserted Successfully.</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>Category not Inserted .</span>";
			return $msg;
		}
	}

	}
}
?>