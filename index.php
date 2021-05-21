<?php
 include('curl.php');
 //login to ERPNEXT
 login("http://34.125.37.244//api/method/login?usr=alan@abakadastudios.com&pwd=Abakada@1");
 // Update data
 $data = array('middle_name'=>'Acordon');
 // update_data("http://34.125.37.244/api/resource/User/alan@abakadastudios.com", $data);
 // Grab data from pccr Rest Api
 echo grab_page("http://34.125.37.244/api/resource/User/alan@abakadastudios.com");
?>