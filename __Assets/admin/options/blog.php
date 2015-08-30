<?php
    $options[] = array( "name" => "Blog",
    					"sicon" => "blog.png",
						"type" => "heading");
						
	$options[] = array( "name" => "Choose the defined Blog page",
						"desc" => "The blog item page will use the same title description, if defined, as the selected page.",
						"id" => SN."singledesc",
                        "type" => "select",
                        "options" => $options_pages);
	
?>