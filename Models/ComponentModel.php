<?php
    class Component {
        public $image;
        public $path;

        function __construct($image, $path) {
            $this->image = $image;
            $this->path = $path;
        }

        function __toString()
        {
            return "image: " . $this->image . ", path: " . $this->path;
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
            new Component("Assets/images/Snippets/footer.png", "Views/Components/foot.php")
        ]
    ];