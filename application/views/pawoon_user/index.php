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
    <button id="btn" class="btn btn-default">Submit</button>
    <table width="900" class="table table-hover">
        <thead>
            <tr>
                <td width ="10%" >UId</td>
                <td width ="30%">Nama</td>
                <td width ="50%">Alamat</td>
                <td width ="20%">Action</td>
            </tr>
        </thead>
        <tbody>
    <?php
    
    
    foreach ($datas as $row) {
            echo '<tr>';
                echo '<td>'. $row['uuid'].'</td>';
                echo '<td>'. $row['nama'].'</td>';
                echo '<td>'. $row['alamat'].'</td>';
                echo '<td><a class="delete-btn" href="javascript:void(0);" data-id='. $row['uuid'].'>delete</a> | <a class="edit-btn" href="javascript:void(0);" data-id='. $row['uuid'].'>edit</a></td>';
            echo '</tr>';
    }
    ?>
            </tbody>
    </table>
    <button id="btn-reload" class="btn btn-success">Reload</button>
</div>
<?php $this->load->view('common/footer'); ?>



