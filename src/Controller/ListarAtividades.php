<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Atividade;
use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class ListarAtividades implements InterfaceControladorRequisicao
{

    use RenderizadorDeHtmlTrait;

    private $repositorioDeAtividades;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeAtividades = $entityManager->getRepository(Atividade::class);
    }

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('trello/listar-atividades.php', [
            'trellos' => $this->repositorioDeAtividades->findAll(),
            'titulo' => 'Lista de Atividades Trello'
        ]);
    }
}
