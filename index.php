<?php
# Displays all videos within a directory for in-browser viewing or for
# html streaming.

###### Set your options here #######
# Directory containing video files
$dir = "files";
# What do you want your title to be?
$title = "Mike's Home File Server";
####################################

?>
<html>

	<head>
		<title><?echo $title?></title>
	</head>

	<body style="font-family:'Helvetica'">
		<h1 style="text-align:center"><?echo $title?></h1>

		<!--  Search form: stores as $query variable -->
        <form style="position:absolute;top:10px;padding-left:15px;" method="post" action="index.php">
            <input type="text" name="search" value="Search" onFocus="this.value=''">
        </form>

        <?
        $query = preg_quote((isset($_POST['search']) ? $_POST['search'] : null));
        ?>

		<div style="position:relative;padding:15px;">
            <table style="width:100%">
                <?
                # searching through directory for video files
                $it = new RecursiveDirectoryIterator($dir);

                # setup row counter for alternating bg colors
                $row_i = 0;
                foreach(new RecursiveIteratorIterator($it) as $file) {
                    if (preg_match("/(.*$query.*)(\.avi$|\.mkv$|\.mp4$|\.m4v$|\.mov$)/i",$file)){
                        # get filename from path
                        $name = basename($file);

                        # convert special characters to html entities
                        $file = htmlspecialchars($file);
                        $file = str_replace(" ","%20",$file);

                        # alternating row colors
                        if ($row_i % 2 == 0){
                            echo "<tr style='background-color:lightgrey;'>";
                        }
                        else {
                            echo "<tr style='background-color:white;'>";
                        }

                        # print url link
                        echo "<td><a href=$file>$name</a></td>";

                        echo "</tr>";

                        # increment counter
                        $row_i++;
                    }
                }
                ?>
            </table>
		</div>
	</body>
</html>
