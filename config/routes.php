<?php

use Alura\Cursos\Controller\Exclusao;
use Alura\Cursos\Controller\FormularioEdicao;
use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListarAtividades;
use Alura\Cursos\Controller\Persistencia;


$rotas = [
    '/listar-atividades' => ListarAtividades::class,
    '/nova-atividade' => FormularioInsercao::class,
    '/salvar-atividade' => Persistencia::class,
    '/excluir-atividade' => Exclusao::class,
    '/alterar-atividade' => FormularioEdicao::class,

];

return $rotas;
