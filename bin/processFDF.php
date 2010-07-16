<?php
    if(isset($_POST) && is_array($_POST) && count($_POST)){
        $data=array();

        echo'<pre>POST '; print_r($_POST);echo '</pre>';

        if(isset($_POST['e_ssn'])){
            $data['e_ssn'] = $_POST['e_ssn'];
            $data['e_ein'] = $_POST['e_ein'];
            
            // need the function definition
            require_once 'bin/createFDF.php';
            
            // some variables to use
            
            // file name will be <the current timestamp>.fdf
            $fdf_file = 'contact_' . $_POST['contact_id'] . '_' . time() . '.fdf';
            
            $fdf_dir = 'uploads';
            
            $pdf_doc = 'http://cassiopeia.roams.utk.edu/contactms/beta/forms/w2-fed.pdf';
            
            // generate the file content
            $fdf_data = createFDF($pdf_doc,$data);

            // write the file out
            if($fp=fopen($fdf_dir.'/'.$fdf_file,'w')){
                fwrite($fp,$fdf_data,strlen($fdf_data));
                echo $fdf_file,' written successfully.';
            }else{
                die('Unable to create file: '.$fdf_dir.'/'.$fdf_file);
            }
            fclose($fp);
        }
    }else{
        echo 'You did not submit a form.';
    }
?>
