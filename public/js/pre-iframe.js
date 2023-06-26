function previewIframe() {
    const frame = document.querySelector('#iframe');
    const previewFrame = document.querySelector('#previewFrame');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(frame.files[0]);

    oFReader.onload = function(oFREvent) {
        const dataURL = oFREvent.target.result;
        previewFrame.src = dataURL;
    }
}

function previewSecondIframe() {
    const frame = document.querySelector('#second_iframe');
    const previewFrame = document.querySelector('#second_previewFrame');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(frame.files[0]);

    oFReader.onload = function(oFREvent) {
        const dataURL = oFREvent.target.result;
        previewFrame.src = dataURL;
    }
}

function previewThirdIframe() {
    const frame = document.querySelector('#third_iframe');
    const previewFrame = document.querySelector('#third_previewFrame');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(frame.files[0]);

    oFReader.onload = function(oFREvent) {
        const dataURL = oFREvent.target.result;
        previewFrame.src = dataURL;
    }
}