$(document).ready(function() {
    // Dummy data for contacts (replace with real data)
    var contacts = [
        { name: "User one", status: "online", image: "https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" },
        { name: "User two", status: "online", image: "https://2.bp.blogspot.com/ -8ytYF7cFpkQ/WkPe1-rtrcI/AAAAAAAAGqU/FGfTDVgkcIwmOTtjlka51vineFBExJuSACLcBGAs/s320/31.jpg" },
        // Add more contacts here
    ];

    // Function to render contacts
    function renderContacts() {
        var contactsList = $('.contacts');
        contactsList.empty();
        contacts.forEach(function(contact) {
            var statusClass = contact.status === "online" ? "online" : "offline";
            var contactItem = `
                <li class="contact">
                    <div class="d-flex bd-highlight">
                        <div class="img_cont">
                            <img src="${contact.image}" class="rounded-circle user_img">
                            <span class="online_icon ${statusClass}"></span>
                        </div>
                        <div class="user_info">
                            <span>${contact.name}</span>
                            <p>${contact.status}</p>
                        </div>
                    </div>
                </li>`;
            contactsList.append(contactItem);
        });
    }

    // Initialize contacts
    renderContacts();

    // Dummy data for messages (replace with real data)
    var messages = [
        { sender: "User one", text: "Hi, how are you?", time: "8:50 AM" },
        { sender: "User two", text: "I am going to the shop. What about you?", time: "8:55 AM" },
        // Add more messages here
    ];

    // Function to render messages
    function renderMessages() {
        var messageContainer = $('.msg_card_body');
        messageContainer.empty();
        messages.forEach(function(message) {
            var messageItem = `
                <div class="d-flex justify-content-start mb-4">
                    <div class="img_cont_msg">
                        <img src="${contacts[0].image}" class="rounded-circle user_img_msg" alt="" width="40" height="40"> <!-- Adjusted width and height -->
                    </div>
                    <div class="img_container">
                        ${message.text}
                        <span class="msg_time">${message.time}</span> 
                    </div>
                </div>`;
            messageContainer.append(messageItem);
        });
    }

    // Initialize messages
    renderMessages();

    // Function to send message
    $('.send_btn').click(function() {
        var messageText = $('.type_msg').val();
        if (messageText.trim() !== '') {
            var message = {
                sender: "Your Name", // Replace with sender's name
                text: messageText,
                time: new Date().toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }) // Get current time
            };
            messages.push(message);
            renderMessages();
            $('.type_msg').val('');
        }
    });
});  