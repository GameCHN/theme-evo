<?php
    $options[] = array( "name" => "Portfolio",
    					"sicon" => "portfolio-32x32.png",
						"type" => "heading");

    $options[] = array( "name" => "Choose the defined Portfolio page",
                        "desc" => "The portfolio item page will use the same title description, if defined, as the selected page.",
                        "id" => SN."portfoliodesc",
                        "type" => "select",
                        "options" => $options_pages);

    $options[] = array( "name" => "Portfolio Items per Page",
                        "desc" => "Set the number of items that appear on the Portfolio page.",
                        "id" => SN."portfolioitemsperpage",
                        "std" => "8",
                        "type" => "text");
?>