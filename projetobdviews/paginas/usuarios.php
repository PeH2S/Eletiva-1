<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/usuarios1.php'; // Nome da função correta
?>

<div class="container mt-5">
    <h2>Gerenciamento de Usuários</h2>
    <a href="novo_usuario.php" class="btn btn-success mb-3">Novo Usuário</a>

    <?php if (isset($_GET['mensagem'])): ?>
        <p class="alert alert-success"><?= htmlspecialchars($_GET['mensagem']); ?></p>
    <?php endif; ?>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Nível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $usuarios = todosUsuarios();
                if (!empty($usuarios)):
                    foreach ($usuarios as $u):
            ?>
            <tr>
                <td><?= htmlspecialchars($u['id']); ?></td>
                <td><?= htmlspecialchars($u['nome']); ?></td>
                <td><?= htmlspecialchars($u['email']); ?></td>
                <td><?= $u['nivel'] === 'adm' ? 'Administrador' : 'Colaborador'; ?></td>
                <td>
                    <?php if ($u['nivel'] !== 'adm'): ?>
                        <a href="excluir_usuario.php?id=<?= htmlspecialchars($u['id']); ?>" class="btn btn-danger">Excluir</a>
                    <?php else: ?>
                        —
                    <?php endif; ?>
                </td>
            </tr>
            <?php    
                    endforeach;
                else:
            ?>
            <tr>
                <td colspan="5">Nenhum usuário encontrado.</td>
            </tr>
            <?php endif; ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
