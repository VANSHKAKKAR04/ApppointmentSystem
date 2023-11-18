// Replace this simple example with your own chatbot logic
// const chatContent = document.getElementById("chat-content");
// const userInput = document.getElementById("user-input");
// const sendButton = document.getElementById("send-button");

// function appendMessage(user, message) {
//     const messageDiv = document.createElement("div");
//     messageDiv.innerHTML = `<strong>${user}:</strong> ${message}`;
//     chatContent.appendChild(messageDiv);
//     chatContent.scrollTop = chatContent.scrollHeight;
// }

// sendButton.addEventListener("click", () => {
//     const userMessage = userInput.value;
//     if (userMessage.trim() === "") return;
//     appendMessage("You", userMessage);
   
//     setTimeout(() => {
//         appendMessage("Chatbot", "Hi , How are you?" +  userMessage);
//     }, 1000);
//     userInput.value = "";
// });

// userInput.addEventListener("keyup", (event) => {
//     if (event.key === "Enter") {
//         sendButton.click();
//     }
// });

const chatContent = document.getElementById("chat-content");
const userInput = document.getElementById("user-input");
const sendButton = document.getElementById("send-button");

function appendMessage(user, message, isLink = false) {
    const messageDiv = document.createElement("div");
    messageDiv.innerHTML = `<strong>${user}:</strong> ${isLink ? `<a href="${message}" target="_blank">${message}</a>` : message}`;
    chatContent.appendChild(messageDiv);
    chatContent.scrollTop = chatContent.scrollHeight;
}

sendButton.addEventListener("click", () => {
    const userMessage = userInput.value;
    if (userMessage.trim() === "") return;
    appendMessage("You", userMessage);

    // Simulate the chatbot response with links
    setTimeout(() => {
        appendMessage("Chatbot", "Where do you want to go? ", true);
        appendMessage("Chatbot", "Visit our <a href='about.html' target='_blank'>For Info </a>.", true);
        appendMessage("Chatbot", "Check out this <a href='new_patient.html' target='_blank'>For Appointment</a>.", true);
        appendMessage("Chatbot", "Check out this <a href='search.html' target='_blank'>For Finding a doctor</a>.", true);
    }, 1000);

    userInput.value = "";
});

userInput.addEventListener("keyup", (event) => {
    if (event.key === "Enter") {
        sendButton.click();
    }
});

