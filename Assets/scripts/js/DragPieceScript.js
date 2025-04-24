function load() {
    $("div.logic_container")
    .on({
        dragleave: function() { $(this).removeClass("overDrag"); },
        dragenter: function(e) { $(this).addClass("overDrag"); },
        dragover: function(e) { e.preventDefault(); },
        drop: function(event) {
            //capacité de limiter le nombre de pièces pouvant entrer dans ce "slot".
            let maxPiecesAttribute = this.getAttribute("max");
            if (maxPiecesAttribute != null && this.children.length >= parseInt(maxPiecesAttribute)) {
                return;
            }

            let dragged = $(".dragged")[0];
            if (typeof(dragged) === 'undefined') {
                return;
            }
            $(dragged).removeClass("dragged");
            $(dragged).css('opacity', '1');
            this.appendChild(dragged);

            update();
        }
    })

    $("div.logic_draggable")
    .on({
        dragstart: function() { $(this).css('opacity', '0.5'); $(this).addClass("dragged"); },
        dragend: function() { $(this).css('opacity', '1'); $(this).removeClass("dragged"); },
        dragleave: function() { $(this).removeClass("overDrag"); },
        dragenter: function(e) { $(this).addClass("overDrag"); },
        dragover: function(e) { e.preventDefault(); },
        drop: function(event) {
            let dragged = $(".dragged")[0];
            $(dragged).removeClass("dragged");
            $(dragged).css('opacity', '1');
            if (this === dragged) {
                return;
            }
            swap(this, dragged);
            update();  
        }
    });

    $("iframe").on(
        {
            "load": (e) => {
                e.target.style.height = e.target.contentWindow.document.body.scrollHeight + 'px';

            }
        }
    )
}

/***
 * @argument a {HTMLElement}
 * @argument b {HTMLElement}
 */
function swap(a, b) {
    if (typeof(a.children[0]) == 'undefined') {
        //a n'as pas de gamins
        a.appendChild(b.removeChild(b.children[0]).cloneNode(true));
    } else if (typeof(b.children[0]) == 'undefined') {
        //b n'as pas de gamins
        b.appendChild(a.removeChild(a.children[0]).cloneNode(true));
    } else {
        //on échange les gamins
        let tmpA = a.removeChild(a.children[0]).cloneNode(true);
        let tmpB = b.removeChild(b.children[0]).cloneNode(true);
        a.appendChild(tmpB);
        b.appendChild(tmpA);
    }
};

function update() {
    const urlThis = new URL(window.document.URL);
    let extensibleContainer = $("div.logic_preview");

    let frame = $("iframe#reload-frame");
    let base = mappings[toKeyMapping(urlThis.pathname)];
    let url = new URL(base, urlThis.href + "/../");//on utilise le ../ pour retourner au root et on ajoute le nouveau chemin.
    extensibleContainer.children().each((i, el) => {
        let img = $(el).children("img")[0];
        if (typeof(img) === 'undefined') {
            return;
        }
        let id = img.id;
        url.searchParams.set(i, id);
    });

    //récupère l'iframe et change sa source, ce qui va la recharger avec les nouveaux paramètres.
    if (typeof(frame) != 'undefined' && frame.length > 0) {
        frame[0].setAttribute("src", url.toString());
    }
}

function toKeyMapping(path) {
    return path.substring(path.lastIndexOf('/') + 1);
}

const mappings = {
    "sandbox": "sandboxpreview"
}

load();