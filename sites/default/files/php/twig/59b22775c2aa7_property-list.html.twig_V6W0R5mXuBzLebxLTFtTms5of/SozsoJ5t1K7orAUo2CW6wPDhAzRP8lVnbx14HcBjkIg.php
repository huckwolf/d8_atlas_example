<?php

/* modules/custom/atlas/templates/property-list.html.twig */
class __TwigTemplate_a882b0dce7e75122409362ed4940de197e7fd4548a54099299646c0486ccd9ce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("if" => 1, "for" => 3);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'for'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        if (((isset($context["properties"]) ? $context["properties"] : null) && ($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "numberOfResults", array(), "array") != 0))) {
            // line 2
            echo "    <p>Number of result is: ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "numberOfResults", array(), "array"), "html", null, true));
            echo "</p>
    ";
            // line 3
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "products", array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
                // line 4
                echo "        <div>
            <h2>";
                // line 5
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["property"], "productName", array(), "array"), "html", null, true));
                echo "</h2>
            <p><b>Address:</b> ";
                // line 6
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["property"], "addresses", array()), "address_line", array()), "html", null, true));
                echo "
                ";
                // line 7
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["property"], "addresses", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["address"]) {
                    // line 8
                    echo "                    ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["address"], "address_line", array(), "array"), "html", null, true));
                    echo " ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["address"], "city", array(), "array"), "html", null, true));
                    echo " ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["address"], "state", array(), "array"), "html", null, true));
                    echo " ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["address"], "postcode", array(), "array"), "html", null, true));
                    echo " ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["address"], "country", array(), "array"), "html", null, true));
                    echo "
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['address'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 10
                echo "            </p>
            <p>";
                // line 11
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["property"], "productDescription", array(), "array"), "html", null, true));
                echo "</p>
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 15
            echo "    There are currently no results been returned, please try other key words
";
        }
    }

    public function getTemplateName()
    {
        return "modules/custom/atlas/templates/property-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 15,  89 => 11,  86 => 10,  69 => 8,  65 => 7,  61 => 6,  57 => 5,  54 => 4,  50 => 3,  45 => 2,  43 => 1,);
    }

    public function getSource()
    {
        return "{% if properties and properties['numberOfResults']  != 0  %}
    <p>Number of result is: {{ properties['numberOfResults'] }}</p>
    {% for property in properties['products'] %}
        <div>
            <h2>{{ property['productName'] }}</h2>
            <p><b>Address:</b> {{ property.addresses.address_line }}
                {% for address in property['addresses'] %}
                    {{ address['address_line'] }} {{ address['city'] }} {{ address['state'] }} {{ address['postcode'] }} {{ address['country'] }}
                {% endfor %}
            </p>
            <p>{{ property['productDescription'] }}</p>
        </div>
    {% endfor %}
{% else %}
    There are currently no results been returned, please try other key words
{% endif %}";
    }
}
