//TODO: Apuntar esta función en Yev tech
export function removeChildren(parent){
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}