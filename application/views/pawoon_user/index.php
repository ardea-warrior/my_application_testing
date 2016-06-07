<?php $this->load->view('common/header'); ?>
<div id="container">
    <h2>Form Registration</h2>
    <div  style="width: 600px; margin-bottom: 20px;">
        <form action="" id="form" class="form-horizontal">
            <div class="form-group">
                <label for="inputUuid" class="col-sm-2 control-label">UID</label>
                <div class="col-sm-10">
                    <input class="form-control" name="uuid" id="uid-txt" disabled="" placeholder="UUID">
                </div>
            </div>
            <div class="form-group">
                <label for="inputUuid" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                    <input class="form-control" id="nama-txt"  name ="nama" placeholder="Nama">
                </div>
            </div>
            <div class="form-group">
                <label for="inputUuid" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                    <input class="form-control" id="alamat-txt"  name ="alamat" placeholder="Alamat">
                </div>
            </div>        

        </form>
        <button id="btn" class="btn btn-default" style="float: right; margin-right: 20px">Submit</button><button id="btn-new" class="btn btn-default" style="float: right; margin-right: 20px">New</button> 
    </div>
    <table id="tb-list" width="900" class="table table-hover">
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
                echo '<tr data-id="' . $row['uuid'] . '">';
                echo '<td>' . $row['uuid'] . '</td>';
                echo '<td>' . $row['nama'] . '</td>';
                echo '<td>' . $row['alamat'] . '</td>';
                echo '<td><a class="delete-btn" href="javascript:void(0);" data-id="' . $row['uuid'] . '">delete</a> | <a class="edit-btn" href="javascript:void(0);" data-id="' . $row['uuid'] . '">edit</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <button id="btn-reload" class="btn btn-success">Reload</button>
</div>
<?php $this->load->view('common/footer'); ?>



