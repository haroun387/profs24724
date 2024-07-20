function enregistrerEnseignant() {
    const formData = new FormData(document.getElementById('enseignantForm'));

    fetch('process_form.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        document.getElementById('result').innerText = result;
    })
    .catch(error => {
        console.error('Erreur:', error);
        document.getElementById('result').innerText = 'Erreur lors de l\'enregistrement';
    });
}
