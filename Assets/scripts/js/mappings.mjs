export const PREVIEW_MAPPINGS = { //page utilisée par l'iframe pour recharger (page actuelle: page preview)
    "sandbox": "sandboxpreview",
    "0_0": "sandboxpreview"
};

export const CONTAINER_TAG = "logic_container"; //un container pour différents éléments
export const PREVIEW_TAG = "logic_preview"; //container utilisé pour charger l'iframe
export const DRAGGABLE_TAG = "logic_draggable"; //un élément pouvant être déplacé avec la souris
export const OVERDRAGGING_TAG = "logic_overDrag"; //classe appliquée quand la souris se trouve au dessus d'un certain container (ayant un element), 
export const DRAGGING_TAG = "logic_dragging"; //l'élément actuellement entrain d'être déplacé
export const EXPANDABLE_TAG = "logic_expandable"; //un container qui peut contenir une quantité non-définie d'éléments
export const PREVIEW_LEFT_TAG = "logic_preview_left" //l'iframe

export const MAXIMUM_ELEMENTS_ATTRIBUTE = "logic_max"; //un attribut définissant la quantité max d'éléments qu'un container puissent contenir.

export function toKeyMapping(path) {
    return path.substring(path.lastIndexOf('/') + 1);
}