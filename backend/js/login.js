document.addEventListener('DOMContentLoaded', () => {
    const alternaCadastro = document.getElementById('alternaCadastro');
    const alternaLogin = document.getElementById('alternaLogin');
    const form1 = document.getElementById('form1');
    const form2 = document.getElementById('form2');

    if (alternaCadastro && alternaLogin && form1 && form2) {
        alternaCadastro.addEventListener('click', (e) => {
            e.preventDefault();
            form1.classList.add('hidden');
            form2.classList.remove('hidden');
        });

        alternaLogin.addEventListener('click', (e) => {
            e.preventDefault();
            form2.classList.add('hidden');
            form1.classList.remove('hidden');
        });
    } else {
        console.error('Elementos do formulário não foram encontrados.');
    }
});
document.addEventListener('DOMContentLoaded', () => {
    // Alternância entre login e cadastro (seu código atual)
    const alternaCadastro = document.getElementById('alternaCadastro');
    const alternaLogin = document.getElementById('alternaLogin');
    const form1 = document.getElementById('form1');
    const form2 = document.getElementById('form2');

    if (alternaCadastro && alternaLogin && form1 && form2) {
        alternaCadastro.addEventListener('click', (e) => {
            e.preventDefault();
            form1.classList.add('hidden');
            form2.classList.remove('hidden');
        });

        alternaLogin.addEventListener('click', (e) => {
            e.preventDefault();
            form2.classList.add('hidden');
            form1.classList.remove('hidden');
        });
    }

    // Captura do cadastro
    const cadastroForm = document.getElementById("cadastroForm");
    if (cadastroForm) {
        cadastroForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const dados = new FormData(cadastroForm);

            const resposta = await fetch("cadastro.php", {
                method: "POST",
                body: dados
            });

            const resultado = await resposta.text();
            alert(resultado);
        });
    }

    // Captura do login
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const dados = new FormData(loginForm);

            const resposta = await fetch("login.php", {
                method: "POST",
                body: dados
            });

            const resultado = await resposta.text();
            alert(resultado);
        });
    }
});
