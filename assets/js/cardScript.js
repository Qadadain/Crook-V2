const cards = document.getElementsByClassName('a-cards');

for (let i = 0; i < cards.length; i++) {
    cards[i].addEventListener('click', e => {
        e.preventDefault()
        if (e.target.tagName !== 'I') {
            window.location.href = cards[i].getAttribute('href');
        }
    })
}
