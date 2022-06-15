export default class BootstrapEla {
    modalWindow;
    constructor(modal) {
        this.modalWindow = new bootstrap.Modal(modal, {keyboard: false});
    }

    openModal(){
        this.modalWindow.show();
    }

    closeModal(){
        this.modalWindow.hide();
    }
}