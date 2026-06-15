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

/* @App/User/login.html.twig */
class __TwigTemplate_875cfb16c84cfe9cfb60d335f8673ee868187c997687ba67bf28f791214a71ab extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "@App/User/login.html.twig", 1);
        $this->blocks = [
            'header' => [$this, 'block_header'],
            'body' => [$this, 'block_body'],
            'stylesheets' => [$this, 'block_stylesheets'],
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
    public function block_header($context, array $blocks = [])
    {
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        // line 6
        echo "    <form class=\"form-signin\" method=\"post\" action=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_check");
        echo "\">
        <div class=\"text-center mb-4\">
            <img src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/img/icon.png"), "html", null, true);
        echo "\" alt=\"\" width=\"72\" height=\"72\">
        </div>
        <h1 class=\"h3 mb-3 font-weight-normal\">Accedi</h1>";
        // line 11
        if (($context["error"] ?? null)) {
            // line 12
            echo "            <div role=\"alert\"
                 class=\"alert alert-danger\">";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans($this->getAttribute(($context["error"] ?? null), "messageKey", []), $this->getAttribute(($context["error"] ?? null), "messageData", []), "security"), "html", null, true);
            echo "</div>";
        }
        // line 15
        if (($context["csrf_token"] ?? null)) {
            // line 16
            echo "            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
            echo twig_escape_filter($this->env, ($context["csrf_token"] ?? null), "html", null, true);
            echo "\"/>";
        }
        // line 18
        echo "        <label for=\"inputEmail\" class=\"sr-only\">Email</label>
        <input type=\"text\" name=\"_username\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, ($context["last_username"] ?? null), "html", null, true);
        echo "\" class=\"form-control\"
               placeholder=\"Username o Email\" required autofocus>
        <label for=\"inputPassword\" class=\"sr-only\">Password</label>
        <input type=\"password\" name=\"_password\" class=\"form-control\" placeholder=\"Password\" required>
        <div class=\"checkbox mb-3\">
            <label>
                <input type=\"checkbox\" value=\"\" id=\"remember_me\" name=\"_remember_me\"> Ricordami
            </label>
        </div>
        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Accedi</button>
        <div class=\"mt-3\">
            <a href=\"";
        // line 30
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_resetting_request");
        echo "\" class=\"text-muted\">Password
                dimenticata?</a>
        </div>
        <p class=\"mt-5 mb-3 text-muted\">&copy;";
        // line 33
        echo twig_escape_filter($this->env, ((twig_date_format_filter($this->env, "now", "Y") . " - ") . ($context["siteName"] ?? null)), "html", null, true);
        echo "</p>
    </form>";
    }

    // line 37
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 38
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/css/login.css"), "html", null, true);
        echo "\">";
    }

    public function getTemplateName()
    {
        return "@App/User/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 38,  105 => 37,  99 => 33,  93 => 30,  79 => 19,  76 => 18,  71 => 16,  69 => 15,  65 => 13,  62 => 12,  60 => 11,  55 => 8,  49 => 6,  46 => 5,  41 => 3,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@App/User/login.html.twig", "/var/www/vhosts/st1995.it/app.st1995.it/src/AppBundle/Resources/views/User/login.html.twig");
    }
}
