<?php $this->load->view('common/header'); ?>
<div id="container">
    <h2>Form Registration</h2>
    <form action="" id="form">
        <div class="" style="display:block">
            <label> UID </label><input type="text" value="" name="uuid" id="uid">
        </div>
        <div class="" style="display:block">
                        <label> Nama </label><input type="text" value="" name ="nama">
        </div>
        <div class="" style="display:block">
            
            <label> Alamat </label><input type="text" value="" name ="alamat">
        </div>
    </form>
    <button id="btn">Submit</button>
    <table width="900">
        <thead>
            <tr>
                <td width ="10%" >UId</td>
                <td width ="30%">Nama</td>
                <td width ="60%">Alamat</td>
            </tr>
        </thead>
        <tbody>
    <?php
    
    
    foreach ($datas as $row) {
            echo '<tr>';
                echo '<td>'. $row['uuid'].'</td>';
                echo '<td>'. $row['nama'].'</td>';
                echo '<td>'. $row['alamat'].'</td>';
            echo '</tr>';
    }
    ?>
            </tbody>
    </table>
</div>
<?php $this->load->view('common/footer'); ?>



