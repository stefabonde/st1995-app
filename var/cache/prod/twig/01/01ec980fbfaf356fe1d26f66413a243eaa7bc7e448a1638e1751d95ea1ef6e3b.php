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

/* @App/components/header.html.twig */
class __TwigTemplate_44665dd65c1d437ad2549e3ebcabe9c3a7e0cc212eca51d33d42e37a3f5da58a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<header>
    <div class=\"navbar navbar-dark bg-dark shadow-sm\">
        <div class=\"container d-flex justify-content-between\">
            <a href=\"";
        // line 4
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("homepage");
        echo "\" class=\"navbar-brand d-flex align-items-center\">
                <img src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/img/icon.png"), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, ($context["siteName"] ?? null), "html", null, true);
        echo "\" style=\"width: 30px;\"
                     class=\"mr-2\">
                <strong>";
        // line 7
        echo twig_escape_filter($this->env, ($context["siteName"] ?? null), "html", null, true);
        echo "</strong>
            </a>
            <nav class=\"my-2 my-md-0 mr-md-3\">";
        // line 10
        if ($this->env->getExtension('Symfony\Bridge\Twig\Extension\SecurityExtension')->isGranted("ROLE_ADMIN")) {
            // line 11
            echo "                    <a class=\"p-2 text-white btn btn-outline-secondary\" href=\"";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("client_index");
            echo "\"><i
                                class=\"fas fa-users\"></i> Clienti</a>
                    <a class=\"p-2 text-white btn btn-outline-secondary\" href=\"";
            // line 13
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("project_index");
            echo "\"><i
                                class=\"fas fa-project-diagram\"></i> Progetti</a>";
        }
        // line 16
        echo "                <a class=\"p-2 text-white btn btn-outline-secondary\" href=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("task_index");
        echo "\"><i
                            class=\"fas fa-tasks\"></i> Attività</a>";
        // line 18
        if ($this->env->getExtension('Symfony\Bridge\Twig\Extension\SecurityExtension')->isGranted("ROLE_ADMIN")) {
            // line 19
            echo "                    <a class=\"p-2 text-white btn btn-outline-warning\" href=\"";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("report");
            echo "\">
                        <i class=\"fas fa-clock\"></i> Report
                    </a>
                    <a class=\"p-2 text-white btn btn-outline-primary\" href=\"";
            // line 22
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("sonata_admin_dashboard");
            echo "\">
                        <i class=\"fas fa-hammer\"></i> Amministrazione
                    </a>";
        }
        // line 26
        if ($this->env->getExtension('Symfony\Bridge\Twig\Extension\SecurityExtension')->isGranted("ROLE_PREVIOUS_ADMIN")) {
            // line 27
            echo "                    <a href=\"";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("homepage", ["_switch_user" => "_exit"]);
            echo "\" class=\"btn btn-outline-primary\">
                        <i class=\"fa fa-backward\" aria-hidden=\"true\"></i> Swicth back
                    </a>";
        }
        // line 31
        echo "                <a class=\"btn btn-outline-secondary\" href=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_logout");
        echo "\"><i
                            class=\"fas fa-sign-out-alt\"></i> Logout</a>
            </nav>
        </div>
    </div>
</header>";
    }

    public function getTemplateName()
    {
        return "@App/components/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 31,  86 => 27,  84 => 26,  78 => 22,  71 => 19,  69 => 18,  64 => 16,  59 => 13,  53 => 11,  51 => 10,  46 => 7,  39 => 5,  35 => 4,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@App/components/header.html.twig", "/var/www/vhosts/st1995.it/app.st1995.it/src/AppBundle/Resources/views/components/header.html.twig");
    }
}
