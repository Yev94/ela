let temporizador = setInterval( () => {
    let element = document.querySelector('._2YPr_.i0jNr.selectable-text.copyable-text');
    if(element) {
        console.log(element.textContent + ' at ' + new Date().toLocaleTimeString());
    }
    }, 1000)