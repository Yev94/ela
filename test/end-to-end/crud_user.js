// Page navigated to http://localhost/ela/panel?db=users
    (async () => {

        // await new Promise(resolve => window.setTimeout(() => {
        //     resolve();
        // }, 300));

        // await new Promise(resolve => window.setTimeout(() => {
        //     let event4 = new MouseEvent('click', { view: window, bubbles: true, cancelable: false });
        //     document.querySelector('.btn-warning').dispatchEvent(event4);
        //     resolve();
        // }, 500));

        await new Promise(
            resolve => window.setTimeout(
                () => {
           let event5 =  new MouseEvent('click', { view: window, bubbles: true, cancelable: false });
            document.querySelector('#year-enrol').dispatchEvent(event5);
            resolve();
        }, 500));

        // await new Promise(resolve => window.setTimeout(() => {
        //     document.querySelector('#year-enrol').value = '2';
        //     resolve(); 
        // }, 500));


        // await new Promise(resolve => window.setTimeout(() => {
        //     document.querySelector('#year-enrol').focus({ preventScroll: false });
        //     const event12 = new KeyboardEvent('keypress', { key: n, code: KeyN, location: 0, repeat: false, ctrlKey: false, shiftKey: false, altKey: false, metaKey: false });
        //     document.dispatchEvent(event12);
        //     resolve();
        // }, 46));


        // await new Promise(resolve => window.setTimeout(() => {
        //     document.querySelector('#modal-enrolment').focus({ preventScroll: false });
        //     const event12 = new KeyboardEvent('keypress', { key: d, code: KeyD, location: 0, repeat: false, ctrlKey: false, shiftKey: false, altKey: false, metaKey: false });
        //     document.dispatchEvent(event12);
        //     resolve();
        // }, 176));

    })();