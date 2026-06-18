// === CHATBOT LOGIC ===
let messageHistory = [];
let retryCount = 0;
const maxRetries = 3;
function openKuyaDaloy() {
    document.getElementById('kuyaDaloyModal').classList.add('show');
    document.getElementById('chatInput').focus();
    if (messageHistory.length === 0) {
        addBotMessage("Hello! I’m Kuya Daloy, your friendly water guide. How can I help you with your water services today? Kumusta ka?");
    }
}
function closeKuyaDaloy() {
    document.getElementById('kuyaDaloyModal').classList.remove('show');
}
function addMessage(text, isUser = false) {
    const messages = document.getElementById('chatMessages');
    const bubble = document.createElement('div');
    bubble.className = `chat-bubble ${isUser ? 'user' : 'bot'}`;
    bubble.innerHTML = text.replace(/\n/g, '<br>');
    messages.appendChild(bubble);
    messages.scrollTop = messages.scrollHeight;
}
function addTypingIndicator() {
    const typing = document.createElement('div');
    typing.className = 'typing-indicator';
    typing.innerHTML = '<div class="typing-dots"><span></span><span></span><span></span></div> Kuya Daloy is typing...';
    document.getElementById('chatMessages').appendChild(typing);
    document.getElementById('chatMessages').scrollTop = document.getElementById('chatMessages').scrollHeight;
    return typing;
}
async function sendMessageToAPI(text) {
    messageHistory.push({ role: 'user', content: text });
    const formData = new FormData();
    formData.append('messages', JSON.stringify(messageHistory));
    try {
        const response = await fetch('public_chat.php', {
            method: 'POST',
            body: formData
        });
        const data = await response.json();
        return data.response || data.error || 'Sorry, something went wrong.';
    } catch (error) {
        return 'Connection error. Please try again.';
    }
}
document.getElementById('chatSend').addEventListener('click', async () => {
    const input = document.getElementById('chatInput');
    const text = input.value.trim();
    if (!text) return;
    input.value = '';
    addMessage(text, true);
    const typing = addTypingIndicator();
    document.getElementById('chatSend').disabled = true;
    let responseText = await sendMessageToAPI(text);
    while (responseText.includes('rate limit') && retryCount < maxRetries) {
        retryCount++;
        await new Promise(resolve => setTimeout(resolve, 2000 * retryCount));
        responseText = await sendMessageToAPI(text);
    }
    typing.remove();
    addMessage(responseText);
    messageHistory.push({ role: 'assistant', content: responseText });
    retryCount = 0;
    document.getElementById('chatSend').disabled = false;
});
document.getElementById('chatInput').addEventListener('keypress', (e) => {
    if (e.key === 'Enter') document.getElementById('chatSend').click();
});
function addBotMessage(text) {
    addMessage(text, false);
    messageHistory.push({ role: 'assistant', content: text });
}