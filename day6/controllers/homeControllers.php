<?
include 'models/viewModel.php';

echo 'home controller';

$vm = new viewModel();

if(!empty($_GET["action"])){
	if($_GET["action"]=='home'){
		$data = array("name"=>"orcun");
		$vm->getView("views/homeView.php",$data);
	}else if($_GET["action"]=="contact"){
		$data = array("name"=>"contact");
		$vm->getView("views/homeView.php",$data);
	}
}else{
	$data = array("name"=>"orcun");
	$vm->getView("views/homeView.php",$data);
}
?>