<?php $this->load->view('common/header'); ?>
<div id="container">
    <h2>Form Registration</h2>
    <form action="" id="form">
        <table width="600">
            <tr>
                <td>
                    <label> UID </label>
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="text" value="" name="uuid" id="uid" disabled="">
                </td>
                
            </tr>
            <tr>
                <td>
                    <label> Nama </label>
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="text" value="" name ="nama">
                </td>
                
            </tr>
            <tr>
                <td>
                    <label> Alamat </label>
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="text" value="" name ="alamat">
                </td>
                
            </tr>
            
        </table>
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
    <button id="btn-reload">Reload</button>
</div>
<?php $this->load->view('common/footer'); ?>



