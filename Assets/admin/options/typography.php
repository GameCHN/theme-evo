<?php
    $options[] = array( "name" => "Typography",
    					"sicon" => "font.png",
						"type" => "heading");
						
	$options[] = array( "name" => "Custom Headings Font",
					"desc" => "This theme uses Google Web Font for headings. You can change it by entering the font details in the fields below.",
					"id" => SN."customfontsinfo",
					"std" => "",
					"type" => "info");
						
	$options[] = array( "name" => "Enable Google Font",
						"desc" => "By unchecking this the theme will use default font for headings, Arial.",
						"id" => SN."customtypography",
						"std" => "0",
						"type" => "checkbox");
						
    $options[] = array( "name" => "Headings Google Font Link",
                        "desc" => "Ex: &lt;link href='http://fonts.googleapis.com/css?family=Sanchez' rel='stylesheet' type='text/css'&gt;",
                        "id" => SN."headingfontlink",
                        "std" => "",
                        "type" => "textarea");

    $options[] = array( "name" => "Headings Google Font Family",
                        "desc" => "Ex: font-family: 'Sanchez', serif",
                        "id" => SN."headingfontface",
                        "std" => "",
                        "type" => "text");	

    $options[] = array( "name" => "Body Google Font Link",
                        "desc" => "Ex: &lt;link href='http://fonts.googleapis.com/css?family=Sanchez' rel='stylesheet' type='text/css'&gt;",
                        "id" => SN."bodyfontlink",
                        "std" => "",
                        "type" => "textarea");

    $options[] = array( "name" => "Body Google Font Family",
                        "desc" => "Ex: font-family: 'Sanchez', serif",
                        "id" => SN."bodyfontface",
                        "std" => "",
                        "type" => "text");				

