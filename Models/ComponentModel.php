<?php
    //Composant  (chemin image, (chemin code)/code)
    class Component {
        public $image;
        public $path;
        public $content;

        function __construct($image, $content_path) {
            $this->image = $image;
            if (stream_resolve_include_path($content_path)) {//est un chemin qui peut être inclus.
                $this->path = $content_path;
            } else {//contenu direct
                $this->content = $content_path;
            }
        }

        function is_path() {
            return isset($this->path);
        }

        function is_content() {
            return isset($this->content);
        }

        function __toString()
        {
            return "image: " . $this->image . ", path: " . $this->path;
        }
    }

    //Position (container, element)
    class ComponentPosition {
        public $containerId;
        public $elementId;

        function __construct($containerId, $elementId)
        {
            $this->containerId = $containerId;
            $this->elementId = $elementId;
        }

        function __toString()
        {
            return "containerId: " . $this->containerId . ", elementId: " . $this->elementId;
        }

        function matches($other) {
            if (!($other instanceof ComponentPosition)) {
                return false;
            }
            if (($other->containerId != $this->containerId) || ($other->elementId != $this->elementId)) {
                return false;
            }

            return true;
        }
    }

    $BASES = [
        "1_1" => "Views/Bases/1_+/1_1.php",
        "1_2" => "Views/Bases/1_+/1_2.php",
        "1_3" => "Views/Bases/1_+/1_3.php",
        "1_4" => "Views/Bases/1_+/1_4.php",
        "1_5" => "Views/Bases/1_+/1_5.php",

        "2_1" => "Views/Bases/2_+/empty.php",
        "2_2" => "Views/Bases/2_+/2_2.php",
        "2_3" => "Views/Bases/2_+/2_3.php",
        "2_4" => "Views/Bases/2_+/2_4.php",
        "2_5" => "Views/Bases/2_+/2_5.php",
        "2_6" => "Views/Bases/2_+/2_6.php",

        "3_1" => "Views/Bases/3_+/3_1.php"
    ];

    $COMPONENTS = [
        "sandbox" => [
            new Component("Assets/images/Snippets/footer.png", "Views/Components/foot.php"),
            new Component("Assets/images/rook.png", "Views/Components/nav.php"),
            new Component("Assets/images/Snippets/index.png", "Views/index.php"),
            new Component("Assets/images/Snippets/HelloWorld.png", "Views/Snippets/HelloWorld.php")
        ],
        # test exercice
        "0_0" => [
            new Component("Assets/images/Snippets/HelloWorld.png", "Views/Snippets/HelloWorld.php"),
            new Component("Assets/images/Snippets/footer.png", "Views/Components/foot.php"),
            new Component("Assets/images/Snippets/index.png", "<p>I have no idea how that works, nope</p>")
        ],

        #exercices CSS
        "1_1" => [ #couleur bg
            new Component("Assets/images/Snippets/1_+/1_1-bg_rouge.png", "background_rouge"), #classe bg rouge
            new Component("Assets/images/Snippets/1_+/1_1-bg_bleu.png", "background_bleu"), #classe bg bleu
            new Component("Assets/images/Snippets/1_+/1_1-bg_vert.png", "background_vert"), #classe bg vert
            new Component("Assets/images/Snippets/1_+/1_+-display_none.png", "display_none"), #classe display none
            new Component("Assets/images/Snippets/1_+/1_1-texte_gras.png", "texte_gras"), #classe texte bold
        ],

        "1_2" => [ #flex
            new Component("Assets/images/Snippets/1_+/1_2-flex_vertical.png", "flex flex_vertical"), #classe flex (vertical flow)
            new Component("Assets/images/Snippets/1_+/1_2-flex_horizontal.png", "flex flex_horizontal"), #classe flex (horizontal flow)
            new Component("Assets/images/Snippets/1_+/1_+-display_none.png", "display_none"), #display none
            new Component("Assets/images/Snippets/1_+/1_2-display_block.png", "display_block"), #display block
        ],

        "1_3" => [ #Animation
            new Component("Assets/images/Snippets/1_+/1_3-hover_texte_gras.png", "hover_texte_gras"), #on hover
            new Component("Assets/images/Snippets/1_+/1_3-click_accroitre.png", "click_div_accroitre"), #on click
            new Component("Assets/images/Snippets/1_+/1_3-disable_texte_rouge.png", "disabled_texte_rouge"), #when disabled
        ],

        "1_4" => [ #Style texte
            new Component("Assets/images/Snippets/1_+/1_4-texte_taille_16.png", "texte_taille_16"), #taille texte ++
            new Component("Assets/images/Snippets/1_+/1_4-texte_gras.png", "texte_gras"), #texte bold
            new Component("Assets/images/Snippets/1_+/1_4-police_texte.png", "texte_police_couriernew_monospace"), #texte font différent
            new Component("Assets/images/Snippets/1_+/1_4-texte_pas_deco.png", "texte_pas_deco"), #retire les décorations de texte
        ],

        "1_5" => [ #Style div
            new Component("Assets/images/Snippets/1_+/1_5-bordure_grasse.png", "bordure_gras"), #border grasse
            new Component("Assets/images/Snippets/1_+/1_5-accroit_padding.png", "padding_accroitre"), #plus de padding
            new Component("Assets/images/Snippets/1_+/1_5-limite_taille_div.png", "div_taille_limite"), #taille max petite
        ],

        #blocs de code (PHP/HTML)
        "2_1" => [ #Page normale / crab
            new Component("Assets/images/Snippets/2_+/2_1_HEAD.png", "Views/Snippets/2_+/2_1_HEAD.php"), #head
            new Component("Assets/images/Snippets/2_+/2_1_MAIN1.png", "Views/Snippets/2_+/2_1_MAIN1.php"), #main 1
            new Component("Assets/images/Snippets/2_+/2_1_MAIN2.png", "Views/Snippets/2_+/2_1_MAIN2.php"), #main 2
            new Component("Assets/images/Snippets/2_+/2_1_FOOT.png", "Views/Snippets/2_+/2_1_FOOT.php") # footer
        ],

        "2_2" => [ #Contenu (1)
            new Component("Assets/images/Snippets/2_+/2_2_OBJLIST1.png", "Views/Snippets/2_+/2_2_OBJLIST1.php"), #liste d'objets
            new Component("Assets/images/Snippets/2_+/2_2_CREDITS.png", "Views/Snippets/2_+/2_2_CREDITS.php"), #contactez nous + crédits
            new Component("Assets/images/Snippets/2_+/2_2_OBJLIST2.png", "Views/Snippets/2_+/2_2_OBJLIST2.php"), #liste d'objets 2
        ],

        "2_3" => [ #Contenu (2)
            new Component("Assets/images/Snippets/2_+/2_3_SECTION_ACTIF.png", "Views/Snippets/2_+/2_3_SECTION_ACTIF.php"), #liste d'utilisateurs actifs
            new Component("Assets/images/Snippets/2_+/2_3_SECTION_REACT.png", "Views/Snippets/2_+/2_3_SECTION_REACT.php"), #réactions
            new Component("Assets/images/Snippets/2_+/2_3_SECTION_POST.png", "Views/Snippets/2_+/2_3_SECTION_POST.php"), #Post
            new Component("Assets/images/Snippets/2_+/2_3_CONTACT.png", "Views/Snippets/2_+/2_3_CONTACT.php"), #contactez nous
            new Component("Assets/images/Snippets/2_+/2_3_SECTION_COMMENTS.png", "Views/Snippets/2_+/2_3_SECTION_COMMENTS.php") #comentaires
        ],

        "2_4" => [ #forms
            new Component("Assets/images/Snippets/2_+/2_4_DESC.png", "Views/Snippets/2_+/2_4_DESC.php"), #text area
            new Component("Assets/images/Snippets/2_+/2_4_SUBMIT.png", "Views/Snippets/2_+/2_4_SUBMIT.php"), #submit button
            new Component("Assets/images/Snippets/2_+/2_4_SPEC.png", "Views/Snippets/2_+/2_4_SPEC.php"), #calendar / dropdown
            new Component("Assets/images/Snippets/2_+/2_4_RADIO.png", "Views/Snippets/2_+/2_4_RADIO.php"), #radios
        ],

        "2_5" => [ #Textes
            new Component("Assets/images/Snippets/2_+/2_5_TITRE.png", "Views/Snippets/2_+/2_5_TITRE.php"), #titre
            new Component("Assets/images/Snippets/2_+/2_5_INTRODUCTION.png", "Views/Snippets/2_+/2_5_INTRODUCTION.php"), #introduction
            new Component("Assets/images/Snippets/2_+/2_5_SOUS_TITRE.png", "Views/Snippets/2_+/2_5_SOUS_TITRE.php"), #sous-titre
            new Component("Assets/images/Snippets/2_+/2_5_DEVELOP.png", "Views/Snippets/2_+/2_5_DEVELOP.php"), #paragraphe 1
            new Component("Assets/images/Snippets/2_+/2_5_DEVELOP2.png", "Views/Snippets/2_+/2_5_DEVELOP2.php"), #paragraphe 2
            new Component("Assets/images/Snippets/2_+/2_5_CONCLUSION.png", "Views/Snippets/2_+/2_5_CONCLUSION.php"), #conclusion
        ],

        "2_6" => [ #Bibliographie
            new Component("Assets/images/Snippets/2_+/2_6_TITRE.png", "Views/Snippets/2_+/2_6_TITRE.php"), #titre
            new Component("Assets/images/Snippets/2_+/2_6_RESSOURCES.png", "Views/Snippets/2_+/2_6_RESSOURCES.php"), #ressources 
            new Component("Assets/images/Snippets/2_+/2_6_CITATIONS.png", "Views/Snippets/2_+/2_6_CITATIONS.php"), #citations + sources
        ],


        #blocs de code (2)
        "3_1" => [ #Import de ressources
            new Component("Assets/images/Snippets/3_+/3_1_IMPORT_CSS.png", "Views/Snippets/3_+/3_1_IMPORT_CSS.php"), #import css
            new Component("Assets/images/Snippets/3_+/3_1_IMPORT_JS.png", "Views/Snippets/3_+/3_1_IMPORT_JS.php"), #import js
        ]
    ];

    $EXERCICES_VERIFICATION = [ //id exercice => (Id composant => Position(container, element)[]) 
        "0_0" => [
            0 => new ComponentPosition(0, 0),
            1 => new ComponentPosition(0, 1)        
        ],

        "1_1" => [
            0 => new ComponentPosition(0, 0),
            1 => new ComponentPosition(1, 0),
        ],
        "1_2" => [
            0 => new ComponentPosition(0, 0),
            1 => new ComponentPosition(1, 0),
        ],
        "1_3" => [
            0 => new ComponentPosition(0, 0),
            1 => new ComponentPosition(1, 0),
            2 => new ComponentPosition(2, 0)
        ],
        "1_4" => [
            0 => new ComponentPosition(0, 0),
            1 => new ComponentPosition(1, 0),
            2 => new ComponentPosition(2, 0),
            3 => new ComponentPosition(3, 0)
        ],
        "1_5" => [
            1 => new ComponentPosition(0, 0),
            2 => new ComponentPosition(1, 0),
            0 => new ComponentPosition(2, 0)
        ],

        "2_1" => [
            0 => new ComponentPosition(0, 0),
            1 => new ComponentPosition(0, 1),
            2 => new ComponentPosition(0, 2),
            3 => new ComponentPosition(0, 3)
        ],
        "2_2" => [
            0 => new ComponentPosition(0, 0),
            2 => new ComponentPosition(1, 0),
            1 => new ComponentPosition(2, 0)
        ],
        "2_3" => [
            2 => new ComponentPosition(0, 0),
            4 => new ComponentPosition(0, 1),
            0 => new ComponentPosition(0, 2),
            1 => new ComponentPosition(0, 3),
            3 => new ComponentPosition(1, 0)
        ],
        "2_4" => [
            //fait comme tu veux.
        ],
        "2_5" => [
            0 => new ComponentPosition(0, 0),
            1 => new ComponentPosition(0, 1),
            2 => new ComponentPosition(0, 2),
            3 => new ComponentPosition(0, 3),
            4 => new ComponentPosition(0, 4),
            5 => new ComponentPosition(0, 5)
        ],
        "2_6" => [
            0 => new ComponentPosition(0, 0),
            1 => new ComponentPosition(0, 1),
            2 => new ComponentPosition(0, 2)
        ],

        "3_1" => [
            //fait comme tu veux.
        ]
    ];