<?php
class ControllerMember{
	static public function ctrAddMember($data){
	   	$answer = (new ModelMembers)->mdlAddMember($data);
	}

	static public function ctrEditMember($data){
	   	$answer = (new ModelMembers)->mdlEditMember($data);
	}

	static public function ctrShowMemberList(){
		$answer = (new ModelMembers)->mdlShowMemberList();
		return $answer;
	}

	static public function ctrShowRegularMemberList(){
		$answer = (new ModelMembers)->mdlShowRegularMemberList();
		return $answer;
	}
	

	static public function ctrShowMember($item, $value){
		$answer = (new ModelMembers)->mdlShowMember($item, $value);
		return $answer;
	}	

	static public function ctrShowSpecMember($category){
		$answer = (new ModelMembers)->mdlShowSpecMember($category);
		return $answer;
	}	

}

?>