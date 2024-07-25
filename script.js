document.getElementById('sendButton').addEventListener('click', sendMessage);
document.getElementById('chatInput').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        sendMessage();
    }
});

document.getElementById('toggleChatButton').addEventListener('click', function () {
    document.getElementById('chatModal').style.display = 'block';
});

document.getElementById('closeChatButton').addEventListener('click', function () {
    document.getElementById('chatModal').style.display = 'none';
});

// Close the modal when clicking outside of the modal content
window.addEventListener('click', function (event) {
    const chatModal = document.getElementById('chatModal');
    if (event.target == chatModal) {
        chatModal.style.display = 'none';
    }
});


function sendMessage() {
    const input = document.getElementById('chatInput');
    const message = input.value.trim();
    if (message) {
        addMessage('user', message);
        input.value = '';
        // Send the message to the bot
        fetch('chatbot-api.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ message: message })
        })
        .then(response => response.json())
        .then(data => {
            addMessage('bot', data.candidates[0].content.parts[0].text);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}

function addMessage(sender, text) {
    const chatBody = document.getElementById('chatBody');
    const messageElement = document.createElement('div');
    messageElement.className = 'message ' + sender;
    messageElement.textContent = text;
    chatBody.appendChild(messageElement);
    chatBody.scrollTop = chatBody.scrollHeight;
}
