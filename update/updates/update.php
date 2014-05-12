<?php



$file = fopen("updates/record.txt", "r");
$i = 0;
while (!feof($file)) {
    $line_of_text .= fgets($file);
}
$members = explode("\n", $line_of_text);
fclose($file);

//for(int $i=0;$i<3;$i++)

while ($i < 4) {
    if ($i == 0) {
        $i++;
        continue;
    } else {
       // echo $i;
        $members[$i] = explode("`", "" . $members[$i]);
       // echo $members[$i][0];
        echo "<p><span><strong>".$members[$i][1]."</strong></span><span><em>(".$members[$i][0].")</em></span></p>";

//                $discription=explode("")
//                for($j=1;$j<$members[$i])
//                echo $members[$i][1];
        $i++;
    }
}
// print_r($members);
?>