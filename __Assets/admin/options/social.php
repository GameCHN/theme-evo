<?php
    $options[] = array( "name" => "Social",
    					"sicon" => "social.png",
						"type" => "heading");

    $options[] = array( "name" => "Display social icons?",
                        "id" => SN."display_social",
                        "std" => "1",
                        "type" => "checkbox");

    $options[] = array( "name" => "Facebook URL",
                        "id" => SN."facebook",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "Twitter URL",
                        "id" => SN."twitter",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "Dribble URL",
                        "id" => SN."dribble",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "LinkedIn URL",
                        "id" => SN."linkedin",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "Pinterest URL",
                        "id" => SN."pinterest",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "RSS",
                        "desc" => "Display RSS link",
                        "id" => SN."rss",
                        "std" => "1",
                        "type" => "checkbox");
    $options[] = array( "name" => "External RSS URL",
                        "desc" => "Add external RSS URL, like Feedburner, etc. This will overwrite the regular blog RSS, if enabled.",
                        "id" => SN."extrss",
                        "std" => "",
                        "type" => "text");




?>