<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
require $_SERVER['DOCUMENT_ROOT'] . '/siga/session/conexao.php';

$conectar = $conectar;

$query = "SELECT idusuario, nome, usuario, email, categoria,telf, imagem as foto FROM vwlogin ORDER BY idusuario ASC LIMIT 1, 18446744073709551615";
$stmt = $conectar->prepare($query);
$stmt->execute();
if (($stmt) and ($stmt->rowCount() != 0)) {
     $i=1;
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
       
        extract($result);
            ?>
            <tr>
                <td> <?php echo $i?></td>
                <td> <?php echo $nome; ?></td>
                <td> <?php echo $usuario; ?></td>
                <td> <?php echo $email; ?></td>
                <td> <?php echo $categoria; ?></td>
                <td> <?php echo $telf; ?></td>
                <td> <img src="<?php
                    switch ($foto) {
                        case 'male.png':
                            echo "../assets/build/images/user/default/$foto";
                            break;
                        case 'famale.png':
                            echo "../assets/build/images/user/default/$foto";
                            break;
                        default:
                            echo "../assets/build/images/user/$idusuario/$foto";
                            break;
                    }
                    ?>"alt="foto" class="avatar" /></td>
                <td>
                    <a href="perfilUsuario.php?a2shs=<?php $num=mascararID($idusuario); echo $num;?>" class="btn btn-primary btn-sm" title="Ver detalhes"><i class="fa fa-eye"></i></a>
                    <a href="editUsuario.php?gs3af=<?php $num=mascararID($idusuario); echo $num;?>" class="btn btn-info btn-sm" title="Editar Usuário"><i class="fa fa-pencil-alt"></i></a>
                    <a href="javascript:void(0)"  onclick="excluirItem(<?php echo $idusuario;?>, 'usuario')" class="btn btn-danger btn-sm " title="Remover Usuário"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php
            $i++;
    }
}
?>




