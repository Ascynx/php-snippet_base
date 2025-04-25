export const PREVIEW_MAPPINGS = {
    "sandbox": "sandboxpreview"
};

export const CONTAINER_TAG = "logic_container";
export const PREVIEW_TAG = "logic_preview";
export const DRAGGABLE_TAG = "logic_draggable";
export const OVERDRAGGING_TAG = "logic_overDrag";
export const DRAGGING_TAG = "logic_dragging";
export const EXPANDABLE_TAG = "logic_expandable";

export const MAXIMUM_ELEMENTS_ATTRIBUTE = "logic_max";

export function toKeyMapping(path) {
    return path.substring(path.lastIndexOf('/') + 1);
}