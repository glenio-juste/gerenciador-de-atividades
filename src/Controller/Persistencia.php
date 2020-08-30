<?php


namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Atividade;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements InterfaceControladorRequisicao
{
    use FlashMessageTrait;

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {

        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );

        $atividade = new Atividade();
        $atividade->setDescricao($descricao);

        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        $tipo = 'success';

        if (!is_null($id) && $id !== false) {
            $atividade->setId($id);
            $this->entityManager->merge($atividade);

            $this->defineMensagem($tipo, 'Atividade atualizada com sucesso');
        } else {
            //inserir 
            $this->entityManager->persist($atividade);

            $this->defineMensagem($tipo, 'Atividade inserida com sucesso');
        }


        $this->entityManager->flush();

        header('Location: /listar-atividades', false, 302);
    }
}
