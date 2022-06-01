var modal = document.getElementById('modal')


document.getElementById('modalClose').addEventListener('click', (e) => {
    e.preventDefault()

    modal.style.display = 'none'
})