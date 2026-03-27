<?php
	class Student {
		private $fname;
		private $lname;
		private $id;
		private $courses;

		public function __construct($name1, $name2, $sID, $c1, $c2, $c3, $g1, $g2, $g3) {
			$this->setFName($name1);
			$this->setLName($name2);
			$this->setID($sID);
			$this->setCourses($c1, $c2, $c3, $g1, $g2, $g3);
		}

		public function getFName() {
			return $this->fname;
		}

		public function getLName() {
			return $this->lname;
		}

		public function getID() {
			return $this->id;
		}

		public function getCourses() {
			return $this->courses;
		}

		private function setFName($arg1) {
			$this->fname = $arg1;
		}

		private function setLName($arg1) {
			$this->lname = $arg1;
		}

		private function setID($arg1) {
			$this->id = $arg1;
		}

		private function setCourses($arg1A, $arg2A, $arg3A, $arg1B, $arg2B, $arg3B) {
			$this->courses = array($arg1A => $arg1B, $arg2A => $arg2B, $arg3A => $arg3B);
		}
	}
?>