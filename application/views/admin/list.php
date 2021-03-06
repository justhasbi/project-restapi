<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <title>List</title>
</head>
<body>

    <?php echo $this->session->flashdata('hasil');?>

    <!-- Content -->
    <div class="card mb-3">
        <div class="card-header">
            <a href="<?php echo base_url('client/add');?>"><button class="btn btn-primary">Tambah Data</button></a>
        </div>

        <div class="card-body">
            <div class="table-resposive">
                <div class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Judul Buku</th>
                            <th>Jenis Buku</th>
                            <th>Nama Pengarang</th>
                            <th>Jumlah Halaman</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($data as $dt):?>
                        
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $dt->judul_buku; ?></td>
                        <td><?php echo $dt->jenis_buku; ?></td>
                        <td><?php echo $dt->nama_pengarang; ?></td>
                        <td><?php echo $dt->jml_halaman; ?></td>
                        
                        <td>
                            <a href="<?php echo base_url('client/edit/'. $dt->id_buku); ?>"><button class="btn btn-sm btn-info">Edit</button></a>
                            
                            <a href="<?php echo base_url('client/delete/'. $dt->id_buku); ?>"><button class="btn btn-sm btn-danger">Delete</button></a>    
                        </td>

                        <?php endforeach;?>
                    </tbody>
                </div>
            </div>
        </div>
    </div>


</body>
    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>