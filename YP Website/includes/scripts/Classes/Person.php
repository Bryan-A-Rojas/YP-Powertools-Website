<?php 
abstract class Person{

	private $id;
	private $name;
	private $email;
	private $password;
	private $profile_image;

	public function getId(){return $this->id;}
	public function setId($id){ $this->id = $id;}
	
	public function getName(){return $this->name;}
	public function setName($name){ $this->name = $name;}
	
	public function getEmail(){return $this->email;}
	public function setEmail($email){ $this->email = $email;}
	
	public function getPassword(){return $this->password;}
	public function setPassword($password){ $this->password = $password;}
	
	public function getProfileImage(){return $this->image;}
	public function setProfileImage($image){ $this->image = $image;}
}