<?php


namespace Alura\Cursos\Helper;

trait RenderizadorDeHtmlTrait
{
    public function renderizaHtml(string $caminhoTemplate, array $dados): string
    {
        extract($dados); // para cada variável
        ob_start(); // começa a guardar tudo que é exibido

        require __DIR__ . '/../../view/' . $caminhoTemplate;
        $html = ob_get_clean(); // limpa o buffer

        return $html;
    }

}