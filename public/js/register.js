document.getElementById('file').onchange = function () {
    document.getElementById('chosenFile').innerHTML = this.files[0].name;
};
