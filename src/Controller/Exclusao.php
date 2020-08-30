<?php


namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Atividade;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class Exclusao implements InterfaceControladorRequisicao
{

    use FlashMessageTrait;

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            
            $this->defineMensagem('danger', 'Atividade inexistente');

            header('Location: /listar-atividades');

            return;
        }

        $atividade = $this->entityManager->getReference(Atividade::class, $id);
        $this->entityManager->remove($atividade);
        $this->entityManager->flush();

        $this->defineMensagem('success', 'Atividade excluída com sucesso');

        header('Location: /listar-atividades');

    }
}
