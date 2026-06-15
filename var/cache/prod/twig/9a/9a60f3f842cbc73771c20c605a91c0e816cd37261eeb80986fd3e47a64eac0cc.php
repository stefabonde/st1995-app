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

/* @App/Client/index.html.twig */
class __TwigTemplate_963fc1677fa2df06cc76e3e3276e0e813848367189e52e05eefa945a5be5a5ce extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "@App/Client/index.html.twig", 1);
        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        // line 4
        echo "    <div class=\"container\">
        <div class=\"row mt-5\">
            <div class=\"col\">
                <h3>Clienti</h3>
            </div>
        </div>
        <div class=\"row mt-3\">
            <div class=\"col\">
                <p>Elenco dei clienti a sistema</p>
            </div>
        </div>
        <div class=\"row mt-3\">
            <div class=\"col\">
                <table class=\"table datatable\">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Aggiornato il</th>
                    </tr>
                    </thead>
                    <tbody>";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["clients"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["client"]) {
            // line 27
            echo "                        <tr>
                            <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["client"], "id", []), "html", null, true);
            echo "</td>
                            <td>
                                <a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("client_detail", ["client" => $this->getAttribute($context["client"], "id", [])]), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["client"], "name", []), "html", null, true);
            echo "</a>
                            </td>
                            <td>";
            // line 33
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["client"], "updatedAt", []), "d/m/Y"), "html", null, true);
            echo "
                            </td>
                        </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['client'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                    </tbody>
                </table>
            </div>
        </div>
    </div>";
    }

    public function getTemplateName()
    {
        return "@App/Client/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 37,  84 => 33,  77 => 30,  72 => 28,  69 => 27,  65 => 26,  42 => 4,  39 => 3,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@App/Client/index.html.twig", "/var/www/vhosts/st1995.it/app.st1995.it/src/AppBundle/Resources/views/Client/index.html.twig");
    }
}
