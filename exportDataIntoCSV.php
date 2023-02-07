<?php 
    include_once('./global.php');
    include_once('./header.php');
    $data=array();
    
    $endPoint = $_GET['type'];
    $fileName = "";
    $sql = "";
    switch($endPoint){
        case 'meal':
            $fileName = 'Meals';
            $sql = "SELECT `name`, `calories`, `protien`, `carbohydrate`, `fat` FROM `meal`";
            break;
        case 'medicine':
            $fileName = 'Medicines';
            $sql = "SELECT `name`, `category`, `weight`, `energy`, `water`, `protien(aa)`, `fat`, `carbohydrate`, `dietary_fiber`, `salt_equivalent`, `sodium`, `potassium`, `chloride`, `calcium`, `magnesium`, `phosphorous`, `acetete`, `iron`, `zinc`, `copper`, `manganese`, `iodine`, `selenium`, `chrome`, `molybdenum`, `vit_A`, `vit_A_carotene`, `vit_D`, `vit_E`, `vit_K`, `vit_B1`, `vit_B2`, `niacin`, `vit_B6`, `vit_B12`, `folic_acid`, `panthothenic_acid`, `biotin`, `vit_C`, `isoleucine`, `leucine`, `valine`, `lysine`, `methionine`, `cystine`, `phenylalanine`, `tyrosine`, `threonine`, `triptophan`, `histidine`, `arginine`, `alanine`, `asparagine_acid`, `glutamine _acid`, `gycine`, `proline`, `serine`, `taurine`, `ornithine`, `glutamine`, `contraindications`, `adverse_reaction` FROM `medicine`";
            break;
            
        case 'guideline':
            $fileName = 'Guideline';
            $sql = "SELECT `heading`, `guideline_type` as 'type', `dsc` as 'description' FROM `guideline` WHERE `publish` = 1";
            break;
            
        case 'rni':
            $fileName = 'RNI';
            $sql = " SELECT name, value FROM `rni`";
            break;
        case 'diagnosis':
            $fileName = 'Diagnosis';
            $sql = "SELECT `name` as 'Diseases', `target_cal_from` as 'Calories From' , `target_cal_to` as 'Calories To', `target_pro_from` as 'Protien From' , `target_pro_to`as 'Protien To' FROM `diagnosis`";
            break;
        case 'activeAdminUser':
            $fileName = 'Admin-User';
            $sql = "SELECT acc_name as 'Name' , acc_email as 'Email' FROM accounts WHERE acc_type = '1' AND acc_grp = '1' ORDER BY acc_id DESC";
            break;
        case 'deactiveAdminUser':
            $fileName = 'Deactive_Admin_User';
            $sql = "SELECT acc_name as 'Name' , acc_email as 'Email' FROM accounts WHERE acc_type = '0' AND acc_grp = '1' ORDER BY acc_id DESC";
            break;
            
        case 'activeWebUser':
            $fileName = 'Doctors';
            $sql = "SELECT `acc_name` AS 'Name', `acc_email` AS 'Email' , `clinic` AS 'Clinic', `mobile` AS 'Phone No', `hospitalAffiliation` AS 'Affiliation', `profession` AS 'Profession', `specialty` AS 'Speciality', `regNo` AS 'Registration No' FROM accounts_user WHERE acc_type = '1' ORDER BY acc_id DESC";
            break;
            
        case 'deactiveWebUser':
            $fileName = 'Inactive_Doctors';
            $sql = "SELECT `acc_name` AS 'Name', `acc_email` AS 'Email' , `clinic` AS 'Clinic', `mobile` AS 'Phone No', `hospitalAffiliation` AS 'Affiliation', `profession` AS 'Profession', `specialty` AS 'Speciality', `regNo` AS 'Registration No' FROM accounts_user WHERE acc_type = '0' ORDER BY acc_id DESC";
            break;
           
           
           
            
            
        
    }
    
    $data_ = $dbF->getRows($sql);
    $data['heading']= array("Sno");

    
    function is_serialize($str){
        $data = @unserialize($str);
        if ($data !== false) {
            return $data['English'];
        } else {
            return $str;
        }
    }
    $i=1;
    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=".$fileName.".xls");  //File name extension was wrong
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
    echo "<table>
            <thead>
                <tr>";
                    echo "<th>Sno</th>";
                    foreach($data_[0] as $head=>$val){
                        echo "<th>". $head ."</th>";
                        // array_push($data['heading'],$head);
                    }
        echo "</tr>
            </thead>
            <tbody>";
            foreach($data_ as $key1=>$row){
                echo "<tr>";
                    echo "<td>".$i."</td>";
                    foreach($row as $key=>$col){
                        echo "<td>".is_serialize($col)."</td>";
                    }
                $i++;
                echo "</tr>";
            }
      echo "</tbody>
      </table>";
?>




