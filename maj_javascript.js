function mettreAJourEnseignant() {
    const formData = new FormData(document.getElementById('updateForm'));

    fetch('update_form.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        document.getElementById('result').innerText = result;
    })
    .catch(error => {
        console.error('Erreur:', error);
        document.getElementById('result').innerText = 'Erreur lors de la mise à jour';
    });
}
