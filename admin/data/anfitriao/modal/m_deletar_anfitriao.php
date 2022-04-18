<?php

include '../../../conexao.php';

$id = $_POST['id'];

$sql = "SELECT * FROM anfitriao WHERE id_anfitriao = '$id'";
$res = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($res);

?>

<div class="modal fade" id="deletarAnfitriao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="del_anfitriao.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar Anfitrião</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja realmente excluir o anfitrião <strong><?= $dados['nome'] ?></strong>?</p>
                    <input type="hidden" name="idAnfitriao" value="<?= $id ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger" id="excluirAnfitriao" name="excluirAnfitriao">Excluir</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#deletarAnfitriao').modal('show')
    })
</script>