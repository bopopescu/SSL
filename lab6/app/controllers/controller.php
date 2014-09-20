<?php
if(isset($_GET['update'])){
    $uMod->update($_GET['name'],$_GET['entry']);
    header('Location: ./?clientId='.$clientId);
}elseif(isset($_GET['delete'])){
    $uMod->delete($_GET['name'],$_GET['entry']);
    header('Location: ./?clientId='.$_GET['clientId']);
}elseif(isset($_GET['title'])){
    $uMod->insert($_GET['name'],$_GET['entry']);
    header('Location: ./?clientId='.$_GET['clientId']);
}
?>