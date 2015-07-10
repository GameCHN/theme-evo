<?php
$options[] = array("name" => "General",
			 "sicon" => "advancedsettings.png",
                   "type" => "heading");


$options[] = array("name" => "Your Logo",
                  "desc" => "You can use your own logo. Click to 'Upload' button and upload your own logo.",
                  "id" => SN."logo",
                  "std" =>  get_template_directory_uri() ."/admin/images/loginlogo.png",
                  "type" => "upload");

$options[] = array("name" => "Text as Logo",
                  "desc" => "If you don't upload your own company logo, this text will show up in it's place.",
                  "id" => SN."logo_text",
                  "std" => "Fizz",
                  "type" => "text");

$options[] = array( "name" => "Custom Favicon",
                  "desc" => "You can use your own custom favicon. Click to 'Upload Image' button and upload your own favicon.",
                  "id" => SN."favicon",
                  "std" => "",
                  "type" => "upload");

$options[] = array( "name" => "Display Call-to-action?",
                        "desc" => "Display call-to-action section, above the footer",
                        "id" => SN."cta_display",
                        "std" => "",
                        "type" => "checkbox",
                        "class" => "tiny");

$options[] = array("name" => "Call-to-action text",
                  "id" => SN."cta_text",
                  "std" => "A call-to-action text",
                  "type" => "text");

$options[] = array("name" => "Call-to-action button text",
                  "id" => SN."cta_button_text",
                  "std" => "Contact us",
                  "type" => "text");

$options[] = array("name" => "Call-to-action button link",
                  "id" => SN."cta_button_link",
                  "std" => "/contact/",
                  "type" => "text");

?>