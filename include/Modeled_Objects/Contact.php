<?php
class Contact{
	private $name;
	private $surname;
	private $mail;
	private $city;
	private $subscriptionDate;
	private $location;
	private $activity;
	private $webSite;

	/*constructor*/
	public function Contact($name, $surname, $mail, $city, $location, $activity, $webSite, $subscriptionDate){
		$this->name=$name;
		$this->surname=$surname;
		$this->mail=$mail;
		$this->city=$city;
		$this->location=$location;
		$this->activity=$activity;
		$this->webSite=$webSite;
		$this->subscriptionDate=$subscriptionDate;
	}

	/*Get & Set section*/
	public function setName($nameToSet){
		$this->name=$nameToSet;
	}

	public function getName(){
		return $this->name;
	}

	public function setSurname($surnameToSet){
		$this->surname=$surnameToSet;
	}

	public function getSurname(){
		return $this->surname;
	}

	public function setMail($mailToSet){
		$this->mail=$nameToSet;
	}

	public function getMail(){
		return $this->mail;
	}
	
	public function setCityl($cityToSet){
		$this->city=$cityToSet;
	}
	
	public function getCity(){
		return $this->city;
	}
	
	public function setLocation($locationToSet){
		$this->location=$locationToSet;
	}
	
	public function getLocation(){
		return $this->location;
	}
	
	public function setActivity($activityToSet){
		$this->activity=$activityToSet;
	}
	
	public function getActivity(){
		return $this->activity;
	}
	
	public function setWebSite($webSiteToSet){
		$this->webSite=$webSiteToSett;
	}
	
	public function getWebsite(){
		return $this->webSite;
	}
	
	public function setSubscriptionDate($dateToSet){
		$this->subscriptionDate=$dateToSet;
	}
	
	public function getSubscriptionDate(){
		return $this->subscriptionDate;
	}
	/*End of Get & Set section*/
}
