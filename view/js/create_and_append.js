export default class CreateAndAppend {
    
    element(father, element, className = undefined) {
        let son = document.createElement(element);
        return this.createdElement(father, son, className);
    }

    textElement(father, element, className = undefined) {
        let son = document.createTextNode(element);
        return this.createdElement(father, son, className);
    }

    //TODO: Apuntar que se puede añadir las clases con el spread operator
    createdElement(father, son, className = undefined) {
        let createdElement = father.appendChild(son);
        if (className) {
            let delimit = ' ';
            if (className.indexOf(delimit) > -1) {
                let arrClassName = className.split(delimit);
                createdElement.classList.add(...arrClassName);
                
                
            }
        }
        return createdElement;
    }
}