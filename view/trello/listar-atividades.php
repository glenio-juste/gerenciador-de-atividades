<?php include __DIR__ . '/../inicio-html.php'; ?>

<a href="/nova-atividade" class="btn btn-primary mb-2">
    Nova Atividade
</a>

<ul class="list-group">
    <?php foreach ($trellos as $atividade) : ?>
        <li class="list-group-item d-flex justify-content-between">
            <?= $atividade->getDescricao(); ?>
            <span>
                <a href="/alterar-atividade?id=<?= $atividade->getId(); ?>" class="btn btn-info btn-sm">
                    Alterar
                </a>
                <a href="/excluir-atividade?id=<?= $atividade->getId(); ?>" class="btn btn-danger btn-sm" 
                        onclick="return confirm('Tem certeza que deseja deletar o registro <?= $atividade->getDescricao(); ?>?')">
                    Excluir
                </a>
            </span>

        </li>
    <?php endforeach; ?>
</ul>

<?php include __DIR__ . '/../fim-html.php'; ?>