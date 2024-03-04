class Accrordion {
    constructor() {}

    init() {
        let question = document.querySelectorAll(".accordion-header");

        question.forEach(question => {
            question.addEventListener("click", event => {
                const active = document.querySelector(".accordion-header.active");
                event.target.closest(".accordion-row").classList.toggle("active");
                if(active && active !== question ) {
                    active.classList.toggle("active");
                    active.nextElementSibling.style.maxHeight = 0;
                    active.nextElementSibling.style.transform = "scaleY(0)";
                    active.parentNode.classList.toggle("active");
                }
                question.classList.toggle("active");
                const answer = question.nextElementSibling;
                if(question.classList.contains("active")){
                    answer.style.maxHeight = "initial";
                    answer.style.transform = "scaleY(1)";
                } else {
                    answer.style.maxHeight = 0;
                    answer.style.transform = "scaleY(0)";
                }
            });
        });
    }
}

export default new Accrordion();