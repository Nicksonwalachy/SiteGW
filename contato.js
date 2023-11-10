document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();

    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let message = document.getElementById('message').value;

    // Enviar a mensagem para o servidor ou a base de dados aqui.

    alert('Mensagem enviada com sucesso!');
});