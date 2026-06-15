<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @App/base.html.twig */
class __TwigTemplate_c7c949cb80186a1c1c0727ef3a4e97a1f74ab4d3d79014598bed5ff524aab841 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'title' => [$this, 'block_title'],
            'header' => [$this, 'block_header'],
            'body' => [$this, 'block_body'],
            'modal' => [$this, 'block_modal'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css\"
          integrity=\"sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS\" crossorigin=\"anonymous\">
    <link href=\"http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css\">
    <link rel=\"stylesheet\" href=\"//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css\">
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css\" rel=\"stylesheet\" />
    <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/css/app.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">";
        // line 16
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 17
        echo "
    <link rel=\"shortcut icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <link rel=\"icon\" href=\"/apple-touch-icon.png\" type=\"image/png\">

    <title>";
        // line 22
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>";
        // line 25
        $this->displayBlock('header', $context, $blocks);
        // line 29
        $this->loadTemplate("@App/components/messages.html.twig", "@App/base.html.twig", 29)->display($context);
        // line 31
        $this->displayBlock('body', $context, $blocks);
        // line 33
        $this->displayBlock('modal', $context, $blocks);
        // line 34
        echo "
<script src=\"https://code.jquery.com/jquery-3.3.1.min.js\"
        integrity=\"sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=\"
        crossorigin=\"anonymous\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js\"
        integrity=\"sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut\"
        crossorigin=\"anonymous\"></script>
<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js\"
        integrity=\"sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k\"
        crossorigin=\"anonymous\"></script>
<script defer src=\"https://use.fontawesome.com/releases/v5.6.3/js/all.js\"
        integrity=\"sha384-EIHISlAOj4zgYieurP0SdoiBYfGJKkgWedPHH4jCzpCXLmzVsw1ouK59MuUtP4a1\"
        crossorigin=\"anonymous\"></script>
<script src=\"//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js\"></script>
<script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>
<script src=\"//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js\"></script>
<script src=\"//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js\"></script>
<script src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/js/app.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
    \$(document).ready(function () {
        \$('textarea').summernote({
            tabsize: 2,
            height: 200
        });
    });
</script>";
        // line 61
        $this->displayBlock('javascripts', $context, $blocks);
        // line 62
        echo "</body>
</html>";
    }

    // line 16
    public function block_stylesheets($context, array $blocks = [])
    {
    }

    // line 22
    public function block_title($context, array $blocks = [])
    {
        echo "Welcome!";
    }

    // line 25
    public function block_header($context, array $blocks = [])
    {
        // line 26
        $this->loadTemplate("@App/components/header.html.twig", "@App/base.html.twig", 26)->display($context);
    }

    // line 31
    public function block_body($context, array $blocks = [])
    {
    }

    // line 33
    public function block_modal($context, array $blocks = [])
    {
    }

    // line 61
    public function block_javascripts($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "@App/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 61,  138 => 33,  133 => 31,  129 => 26,  126 => 25,  120 => 22,  115 => 16,  110 => 62,  108 => 61,  97 => 52,  77 => 34,  75 => 33,  73 => 31,  71 => 29,  69 => 25,  64 => 22,  57 => 17,  55 => 16,  52 => 15,  36 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@App/base.html.twig", "/var/www/vhosts/st1995.it/app.st1995.it/src/AppBundle/Resources/views/base.html.twig");
    }
}
