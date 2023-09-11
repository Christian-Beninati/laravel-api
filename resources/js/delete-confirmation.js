const deleteForms = document.querySelectorAll(".delete-form");

deleteForms.forEach(form => {
    form.addEventListener("submit", e => {
        e.preventDefault();
        const hasConfirmed = confirm(`Are you sure you want to delete this project?`);
        if (hasConfirmed) form.submit();
    });
});