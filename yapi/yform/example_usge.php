<?php
//example form
$test_form = new yform("","POST","class_name","form title");

//text
$test_form->text("no_nabgeme","","text","text_test",1,"placeholder",4,"test value");

//password
$test_form->text("no_name","","password","password_test",1,"placeholder");

//email
$test_form->text("no_nabgeme","","email","email_test",1,"placeholder");

//textarea
$test_form->textarea("no_nabbabe","","textarea_test",0,"placeholder");

//select
$select_r = array(['value'=>1,'name'=>'foo'],['value'=>2,'name'=>'bar','selected'=>1]);
//with form control
$test_form->select("no_nabbabe"," form-control","select_test1",$select_r
,"placeholder");
//witout form control
$test_form->select("no_nabbabe","","select_test2",$select_r,"placeholder");

//chackbox
$chackbox_r = array(['value'=>1,'name'=>'foo[]','required'=>1,'checked'=>0,'label'=>"foo"],
['value'=>1,'name'=>'foo[]','required'=>0,'checked'=>1,'label'=>"bar"]);

$test_form->chackboxes($chackbox_r,"-inline  ","chackboxes test");

//radio
$radio_r = array(['value'=>1,'name'=>'foo_radio','required'=>1,'label'=>"foo"],
['value'=>1,'name'=>'foo_radio','required'=>0,'label'=>"bar",'checked'=> 1]);
$test_form->radios($radio_r,"-inline","radios test");

//upluad
$test_form->upload("upload_file","upload file");

//custom
$test_form->custom("<h2>custom elemnt</h2>");


//submit
$test_form->submit("sub","submit");


//create form
echo "<div style='
    padding: 30;'>";//some padding 

echo $test_form->create();
echo "</div>";
?>