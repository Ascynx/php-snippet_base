import { PREVIEW_MAPPINGS, CONTAINER_TAG, OVERDRAGGING_TAG, DRAGGABLE_TAG, DRAGGING_TAG,  PREVIEW_TAG, toKeyMapping, MAXIMUM_ELEMENTS_ATTRIBUTE, EXPANDABLE_TAG, PREVIEW_LEFT_TAG } from "./mappings.mjs";
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
                let preview_left = $("." + PREVIEW_LEFT_TAG);
                let height = 128;
                if (typeof(preview_left) !== 'undefined') {
                    height = getChildrenCompiledHeight(preview_left[0]);
                }
                e.target.style.height = Math.max(height, e.target.contentWindow.document.body.scrollHeight) + 'px';

            }
        }
    )

    $("button[type=submit]").on(
        {
            "click": (e) => {
                if ($("div." + PREVIEW_TAG).length != $("div."+PREVIEW_TAG).has("img").length)  {
                    //Il faut un minimum d'un par element.
                    alert("not all filled");
                }

                let transfert = $("textarea#logic_transfer");
                remplisObjetDeTransfert(transfert)
            }
        }
    )
}



/**
 * 0xFFFF_FFFF
 * 0xFFFFFFFF - 0xFFFF0000 => element Index
 * 0xFFFFFFFF - 0x0000FFFF => container Index
 * chacun permettent un total de 65655 possibilités.
 * 
 * @param {number} containerIndex 
 * @param {number} elementIndex 
 * @returns {number} sous format 0xFFFF_FFFF (0xcontainerId_elementId) max id 65655 pour les deux
 */
function toBitIndex(containerIndex, elementIndex) {
    let bitId = elementIndex | (containerIndex << 16);
    return bitId;
}

/**
 * version javascript si nécessaire
 * @param {number} bitIndex 
 * @returns { {containerId: number, elementId: number} }   
 */
function fromBitIndex(bitIndex) {
    let containerId = bitIndex >> 16;
    let elementId = bitIndex - (containerId << 16);
    return {containerId, elementId};
}

/**
 * 
 * @param {HTMLElement} objTransfert 
 */
function remplisObjetDeTransfert(objTransfert) {
    let extensibleContainers = $("div." + PREVIEW_TAG);
    let valueString = "";
    extensibleContainers.each((containerId, container) => {
        $(container).children().each((elementId, element) => {
            let img = $(element).children("img")[0];
            if (typeof(img) === 'undefined') {
                return;
            }
            
            let id = img.id;
            valueString += toBitIndex(containerId, elementId) + "=" + id + ";";
        })
    })
    $(objTransfert).val(valueString);
}

/**
 * @param {HTMLElement} a
 * @param {HTMLElement} b
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
    let extensibleContainers = $("div." + PREVIEW_TAG);

    let frame = $("iframe#reload-frame");
    let base = PREVIEW_MAPPINGS[toKeyMapping(urlThis.pathname)];
    let url = new URL(base, urlThis.href + "/../");//on utilise le ../ pour retourner a la source et on ajoute le nouveau chemin.
    extensibleContainers.each((containerIndex, container) => {
        $(container).children().each((elementIndex, element) => {
            let img = $(element).children("img")[0];
            if (typeof(img) === 'undefined') {
                return;
            }
            let id = img.id;

            url.searchParams.set(toBitIndex(containerIndex, elementIndex), id);
        });
    })

    //récupère l'iframe et change sa source, ce qui va la recharger avec les nouveaux paramètres.
    //modifiable via ctrl + I mais c'est pas un système nécessitant beaucoup de sécurité.
    if (typeof(frame) != 'undefined' && frame.length > 0) {
        frame[0].setAttribute("src", url.toString());
    }
}

/**
 * 
 * @param {HTMLElement} el 
 */
function updateCSS(el) {
    let height = getChildrenCompiledHeight(el);
    height += 128;

    el.style.setProperty("height", height + "px");
}

/**
 * @param {HTMLElement} el
 */
function getChildrenCompiledHeight(el) {
    let height = 0;
    for (let i = 0; i < el.children.length; i++) {
        let item = el.children.item(i);
        height += $(item).height();
    }
    return height; 
}

load();