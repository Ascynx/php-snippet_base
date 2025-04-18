function load() {
    
    $("div.containerContainer")
    .on({
        dragleave: function() { $(this).removeClass("overDrag"); },
        dragenter: function(e) { $(this).addClass("overDrag"); },
        dragover: function(e) { e.preventDefault(); },
        drop: function(event) {
            console.log("dropped: ");
            console.log($(".dragged"));
            let dragged = $(".dragged")[0];
            if (typeof(dragged) === 'undefined') {
                return;
            }
            $(dragged).removeClass("dragged");
            $(dragged).css('opacity', '1');
            this.appendChild(dragged);

            update();
        }
    });

    $("div.dragContainer")    
    .on({
        dragstart: function() { $(this).css('opacity', '0.5'); $(this).addClass("dragged"); },
        dragleave: function() { $(this).removeClass("overDrag"); },
        dragenter: function(e) { $(this).addClass("overDrag"); },
        dragover: function(e) { e.preventDefault(); },
        dragend: function() { $(this).css('opacity', '1'); $(this).removeClass("dragged"); },
        drop: function(event) {
            let dragged = $(".dragged")[0];
            $(dragged).removeClass("dragged");
            $(dragged).css('opacity', '1');
            if (this === dragged) {
                return;
            }
            swap(this, dragged);   
        }
    })

    $("div.emptyContainer")
    .on({
        dragstart: function() {
            let dragged = $(this).find("div.dragContainer")[0];
            if (typeof(dragged) != 'undefined') {
                $(dragged).addClass("dragged");
            }
        },
        dragend: function() {
            let dragged = $(this).find("div.dragContainer")[0];
            if (typeof(dragged) != 'undefined') {
                $(dragged).removeClass("dragged");
            }
        },

        dragleave: function() { $(this).removeClass("overDrag"); },
        dragenter: function(e) { $(this).addClass("overDrag"); },
        dragover: function(e) { e.preventDefault(); },
        drop: function(event) {
            let dragged = $(".dragged")[0];

            if ($(this).find("div.dragContainer").length == 0) {
                $(dragged).removeClass("dragged");
                $(dragged).css('opacity', '1');

                this.appendChild(dragged);
            } else {
                
            }

            update();
        } 
    })
}

/***
 * @argument a {HTMLElement}
 * @argument b {HTMLElement}
 */
function swap(a, b) {
    let tmpA = a.removeChild(a.children[0]).cloneNode(true);
    let tmpB = b.removeChild(b.children[0]).cloneNode(true);
    a.appendChild(tmpB);
    b.appendChild(tmpA);
};

function update() {
    let emptyContainers = $("div.emptyContainer");
    let frame = $("iframe#reload-frame");
    let base = "testing";
    let url = new URL(base, new URL(window.document.URL).origin);
    emptyContainers.each((i, el) => {
        let containerId = el.id;
        let dragPiece = $(el).find("div.dragPiece");
        if (typeof(dragPiece) != 'undefined' && dragPiece.length > 0) {
            let id = dragPiece[0].id;
            url.searchParams.set("container-" + containerId, id);
        } else {
            url.searchParams.set("container-" + containerId, -1);
        }
    });


    if (typeof(frame) != 'undefined' && frame.length > 0) {
        frame[0].setAttribute("src", url.toString());
    }
}

load();