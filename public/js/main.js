function toggleFAQ(id) {
    const answer = document.getElementById(`faq-${id}`);
    const icon = document.getElementById(`ch-${id}`);
    if(answer)
        icon.classList = answer.classList.toggle("hidden") ?
            "fas fa-chevron-down":
            "fas fa-chevron-up";
}