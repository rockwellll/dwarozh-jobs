document.getElementById('file').onchange = function () {
    console.log("chosen")
    document.getElementById('chosenFile').innerHTML = this.files[0].name;
};
