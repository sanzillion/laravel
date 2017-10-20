<?php 

if(symlink('../public_html/storage/app/public', '../public_html/public/storage')){
	echo 'Linked!';
}
else{
	echo 'Fail!';
}

 ?>

