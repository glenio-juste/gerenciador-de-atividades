<?php


namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Atividade;
use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;
use Alura\Cursos\Infra\EntityManagerCreator;


class FormularioEdicao implements InterfaceControladorRequisicao
{

    use RenderizadorDeHtmlTrait;

    /**
     * @varnce\ObjectRepository
     */
    private $repositorioDeAtividades;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeAtividades = $entityManager->getRepository(Atividade::class);
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            header('Location: /listar-atividades');
        }
 
        $atividade = $this->repositorioDeAtividades->find($id);
        echo $this->renderizaHtml(
            'trello/formulario-atividade.php',
            [
                'atividade' => $atividade,
                'titulo' => 'Alterar Atividade ' . ' -> ' . $atividade->getDescricao()
            ]
        );
    }
}
