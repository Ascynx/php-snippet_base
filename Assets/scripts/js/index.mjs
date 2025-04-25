import { PREVIEW_MAPPINGS, CONTAINER_TAG, OVERDRAGGING_TAG, DRAGGABLE_TAG, DRAGGING_TAG,  PREVIEW_TAG, toKeyMapping, MAXIMUM_ELEMENTS_ATTRIBUTE, EXPANDABLE_TAG } from "./mappings.mjs";
//.mjs car import depuis modules.

function load() {
    $("div." + CONTAINER_TAG)
    .on({
        dragleave: function() { $(this).removeClass(OVERDRAGGING_TAG); },
        dragenter: function(e) { $(this).addClass(OVERDRAGGING_TAG); },
        dragover: function(e) { e.preventDefault(); },
        drop: function(event) {
            //capacité de limiter le nombre de pièces pouvant entrer dans ce "slot".
            let maxPiecesAttribute = this.getAttribute(MAXIMUM_ELEMENTS_ATTRIBUTE);
            if (maxPiecesAttribute != null && maxPiecesAttribute !== "-1" && this.children.length >= parseInt(maxPiecesAttribute)) {
                return;
            }

            let dragged = $("." + DRAGGING_TAG)[0];
            if (typeof(dragged) === 'undefined') {
                return;
            }
            let oldContainer = $(dragged).parents("." + CONTAINER_TAG);
            $(dragged).removeClass(DRAGGING_TAG);
            $(dragged).css('opacity', '1');
            this.appendChild(dragged);

            if (typeof(oldContainer[0]) != 'undefined' && oldContainer[0].classList.contains(EXPANDABLE_TAG)) {
                updateCSS(oldContainer[0]);
            }
            if (this.classList.contains(EXPANDABLE_TAG))
                updateCSS(this);
            update();
        }
    })

    $("div." + DRAGGABLE_TAG)
    .on({
        dragstart: function() { $(this).css('opacity', '0.5'); $(this).addClass(DRAGGING_TAG); },
        dragend: function() { $(this).css('opacity', '1'); $(this).removeClass(DRAGGING_TAG); },
        dragleave: function() { $(this).removeClass(OVERDRAGGING_TAG); },
        dragenter: function(e) { $(this).addClass(OVERDRAGGING_TAG); },
        dragover: function(e) { e.preventDefault(); },
        drop: function(event) {
            let dragged = $("." + DRAGGING_TAG)[0];
            $(dragged).removeClass(DRAGGING_TAG);
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
                e.target.style.height = Math.max(128, e.target.contentWindow.document.body.scrollHeight) + 'px';

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
    let extensibleContainer = $("div." + PREVIEW_TAG);

    let frame = $("iframe#reload-frame");
    let base = PREVIEW_MAPPINGS[toKeyMapping(urlThis.pathname)];
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

/**
 * 
 * @param {HTMLElement} el 
 */
function updateCSS(el) {
    el.style.setProperty("height", (el.children.length + 1) * 128 + "px");
}

load();