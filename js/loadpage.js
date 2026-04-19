function loadPage(pagina) {
    const conteudo = document.getElementById("conteudo");
   //conteudo.innerHTML = "<p>Carregando...</p>";

    fetch(pagina, { credentials: "same-origin" })
        .then(response => response.text())
        .then(html => {
            conteudo.innerHTML = html;

           
            const scripts = conteudo.querySelectorAll("script");
            scripts.forEach(script => {
                const novo = document.createElement("script");
                novo.text = script.innerHTML;
                document.body.appendChild(novo);
            });

            
            if (window.$ && $.fn.select2) {
                $('#selLivro').select2();
                $('#selAluno').select2();
            }
        })
        .catch(() => {
            conteudo.innerHTML = "<h3>Erro ao carregar conteúdo</h3>";
        });
}