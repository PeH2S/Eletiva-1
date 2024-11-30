<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/reservas.php'; 
    require_once '../funcoes/eventos.php'; 

    // Buscar os eventos disponíveis
    $eventos = buscarEventos();
    $erro = '';

    // Obter o ID do usuário logado (se aplicável)
    // Exemplo: se você usa sessões para gerenciar usuários, algo como:
    session_start();
    $pessoa_id = $_SESSION['usuario_id'];  // Supondo que o ID do usuário logado esteja na sessão

    // Definir um status padrão (por exemplo, "pendente")
    $status = 'pendente';

    // Se o formulário for enviado
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            // Recebendo dados do formulário
            $data_inicial = $_POST['data_inicial'];
            $data_final = $_POST['data_final'];
            $evento_id = intval($_POST['evento_id']);
            $espaco_id = $_POST['espaco_id'];  // Supondo que você tenha esse campo no formulário

            // Validação dos campos
            if(empty($data_inicial) || empty($data_final) || empty($evento_id) || empty($espaco_id)){
                $erro = "Informe todos os campos obrigatórios!";
            } else {
                // Criar a reserva
                if (criarReserva($data_inicial, $data_final, $evento_id, $espaco_id, $pessoa_id, $status)) {
                    header('Location: reservas.php'); 
                    exit();
                } else {
                    $erro = "Erro ao criar a reserva!";
                }
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Criar Nova Reserva</h2>
    
    <!-- Exibir erro, se houver -->
    <?php if (!empty($erro)) :  ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <!-- Formulário para criar reserva -->
    <form method="post">
        <div class="mb-3">
            <label for="data_inicial" class="form-label">Data Inicial</label>
            <input type="date" name="data_inicial" id="data_inicial" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="data_final" class="form-label">Data Final</label>
            <input type="date" name="data_final" id="data_final" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="evento_id" class="form-label">Evento</label>
            <select name="evento_id" id="evento_id" class="form-select" required>
                <?php foreach($eventos as $evento) : ?>
                    <option value="<?= $evento['id']?>"><?= $evento['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="espaco_id" class="form-label">Espaço</label>
            <select name="espaco_id" id="espaco_id" class="form-select" required>
                <option value="1">Espaço 1</option>
                <option value="2">Espaço 2</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Criar Reserva</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
