<?php

class FieldElement extends OxyEl {

    function init() {

    }

    function afterInit() {
        $this->removeApplyParamsButton();
    }

    function name() {
        return 'Field Element';
    }

    function tag() {
        return array(
            "default" => "div",
            "choices" => "div,h1,h2,h3,h4,h5,h6,a"
        );
    }
    function dynamic_attributes( $options ) {
        // Seulement avoir un href sur l'élément si l'option "a" est sélectionné
        if($options['html_tag'] == "a" && isset($options['field_link'])) {
        return array(
            array(
                'name' => 'href',
                'value' => $options['field_link']
            )
        );
    }
    }
    
    function slug() {
        return "field-element";
    }

    function icon() {
        // Path to icon here.
    }

    function button_place() {
        // return "interactive";
    }

    function button_priority() {
        // return 9;
    }

    
    function render($options, $defaults, $content) {


        // Initialiser les contrôles dans des variables
        $fieldSlug = isset( $options['field_slug'] ) ? esc_attr($options['field_slug']) : "";
        $fieldLocation = $options['field_location'];
        
        switch ($fieldLocation) {
            case "Post":
                $fieldValue = get_field($fieldSlug);
                break;
            case "Option Page":
                $fieldValue = get_field($fieldSlug, "option");
                break;
            case "Repeater":
                $fieldValue = get_sub_field($fieldSlug);
                break;
        }

        // Initialiser une variable contenant l'URL d'un champ si celui-ci est un lien
        if (is_array($fieldValue) && isset ( $fieldValue['url'] )) {
        $fieldLink = ($options['html_tag'] == "a") ? $fieldValue['url'] : null;
        }
        /*if ($options['html_tag'] == "a") {
            var_dump($fieldValue['url']);
            //$fieldLink = $fieldValue["url"];
        } else {
            $fieldLink = null;
        }*/

        if(isset($fieldLink)) {
        /*if(str_starts_with($fieldLink, "/")) {
            $fieldLink = home_url() . $fieldLink;
        }*/
        $options['field_link'] = $fieldLink;
    }


        $this->El->dynamicAttributes( $this->dynamic_attributes($options) );

        $output = $fieldValue;

        if($options['html_tag'] != "a") {
            if($fieldValue == "" || $fieldValue == "Array") {
                $output = "Field value not set / not valid.";
            }
        } 
        else {
            if($fieldValue == "") {
                $output = "Field value not set / not valid.";
            } else {
                $output = $fieldValue['title'];
            }
        }

        echo $output;

    }

    function controls() {

        $this->addTagControl();

        $this->addOptionControl(
            array(
            "type" => "textfield",
            "name" => "Field Slug",
            "slug" => "field_slug"
            )
        )->rebuildElementOnChange();

        $this->addOptionControl(
            array(
            "type" => "buttons-list",
            "name" => "Field Location",
            "slug" => "field_location",
            "value" => array('Post','Option Page','Repeater'),
            "default" => "Post"
            )
        )->rebuildElementOnChange();

    }
    
}

new FieldElement();
