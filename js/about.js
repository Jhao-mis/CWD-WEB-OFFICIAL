function switchTab(event, tabId) {
    // Update Tab Buttons
    document.querySelectorAll('.tab-card').forEach(card => {
        card.classList.remove('active');
    });
    event.currentTarget.classList.add('active');

    // Update Content
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.remove('active');
    });
    document.getElementById(tabId).classList.add('active');

    // Scroll to top of content on mobile
    if (window.innerWidth < 1024) {
        document.querySelector('article').scrollIntoView({ behavior: 'smooth' });
    }
}