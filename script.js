// Open contact form for selected team member
function openContactForm(name, position) {
    const url = `member_contact.html?name=${encodeURIComponent(name)}&position=${encodeURIComponent(position)}`;
    window.location.href = url;
}
