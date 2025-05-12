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

    $COMPONENTS = [
        "testing" => [
            new Component("Assets/images/Snippets/footer.png", "Views/Components/foot.php"),
            new Component("Assets/images/rook.png", "Views/Components/nav.php"),
            new Component("Assets/images/Snippets/index.png", "Views/index.php"),
            new Component("Assets/images/Snippets/HelloWorld.png", "Views/Snippets/HelloWorld.php")
        ],

        "0_0" => [
            new Component("Assets/images/Snippets/HelloWorld.png", "Views/Snippets/HelloWorld.php"),
            new Component("Assets/images/Snippets/footer.png", "Views/Components/foot.php"),
            new Component("Assets/images/Snippets/index.png", "<p>I have no idea how that works, nope</p>")
        ]
    ];

    $EXERCICES_VERIFICATION = [ //id exercice => (Id composant => Position(container, element)[]) 
        "0_0" => [
            new ComponentPosition(0, 0),
            new ComponentPosition(0, 1)        
        ]
    ];