<?php include 'header.php' ?>

<?php
    
    $sql_user = "SELECT COUNT(id_anfitriao) as quantidade
    FROM anfitriao
    WHERE status = 'A'";
    $result = mysqli_query($conexao, $sql_user);
    $dados = mysqli_fetch_assoc($result);



?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>    

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $dados['quantidade'] ?></h3>
                    <p><?= ($dados['quantidade'] > 1) ? 'Anfitriões Registrados' : 'Anfitrião Registrado' ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-briefcase"></i>
                </div>
                <a href="list_anfitriao.php" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

<?php include 'footer.php' ?>